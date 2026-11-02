from flask import Flask, redirect, render_template, request, url_for, session
from flask_mysqldb import MySQL
from werkzeug.security import generate_password_hash, check_password_hash

app = Flask(__name__)
app.config["TEMPLATES_AUTO_RELOAD"] = True
app.config['MYSQL_HOST'] = 'localhost'
app.config['MYSQL_USER'] = 'root'
app.config['MYSQL_PASSWORD'] = ''
app.config['MYSQL_DB'] = 'flasktiid'
app.secret_key = 'mysecretkey'

mysql = MySQL(app)


@app.route("/")
def home():
    return redirect(url_for("login"))


@app.route("/registro", methods=["GET", "POST"])
def registro():
    if request.method == "POST":
        nombre = request.form["nombre"]
        apellido_p = request.form["apellido_p"]
        apellido_m = request.form["apellido_m"]
        correo = request.form["correo"]
        password = request.form["password"]
        id_rol = request.form["id_rol"]

        # Solo se aceptan roles válidos
        if id_rol not in ("1", "2"):
            return render_template("registro.html", error="Rol no válido")

        password_hash = generate_password_hash(password)

        cursor = mysql.connection.cursor()
        cursor.execute("SELECT id FROM usuarios WHERE correo = %s", (correo,))
        if cursor.fetchone():
            cursor.close()
            return render_template("registro.html", error="El correo ya existe")

        cursor.execute(
            """INSERT INTO usuarios (nombre, apellido_p, apellido_m, correo, password, id_rol)
               VALUES (%s, %s, %s, %s, %s, %s)""",
            (nombre, apellido_p, apellido_m, correo, password_hash, id_rol)
        )
        mysql.connection.commit()
        cursor.close()
        return redirect(url_for("login"))
    return render_template("registro.html")


@app.route("/login", methods=["GET", "POST"])
def login():
    if request.method == "POST":
        correo = request.form["correo"]
        password = request.form["password"]

        cursor = mysql.connection.cursor()
        cursor.execute("""
            SELECT usuarios.id, usuarios.nombre, usuarios.password, roles.nombre
            FROM usuarios INNER JOIN roles ON usuarios.id_rol = roles.id_roles
            WHERE usuarios.correo = %s
        """, (correo,))
        usuario = cursor.fetchone()
        cursor.close()

        if usuario and check_password_hash(usuario[2], password):
            session["id_usuario"] = usuario[0]
            session["nombre"] = usuario[1]
            session["rol"] = usuario[3]
            if session["rol"] == "Administrador":
                return redirect(url_for("admin"))
            return redirect(url_for("usuario"))
        else:
            return render_template("login.html", error="Correo o contraseña incorrectos")
    return render_template("login.html")


@app.route("/admin")
def admin():
    if "id_usuario" not in session:
        return redirect(url_for("login"))
    if session.get("rol") != "Administrador":
        return redirect(url_for("usuario"))
    return render_template("Administrador.html", nombre=session["nombre"])


@app.route("/usuario")
def usuario():
    if "id_usuario" not in session:
        return redirect(url_for("login"))
    return render_template("usuarios.html", nombre=session["nombre"])


@app.route("/logout")
def logout():
    session.clear()
    return redirect(url_for("login"))


if __name__ == "__main__":
    app.run(port=5000, debug=True)