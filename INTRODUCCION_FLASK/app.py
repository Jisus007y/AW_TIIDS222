# Importamos la libreria de flask
from flask import Flask, render_template

# Creamos una instancia del proyecto
app = Flask(__name__)
app.config["TEMPLATES_AUTO_RELOAD"] = True

# Creacion de rutas

@app.route("/")
# Crear un funcion que se llama home
def home():
    # Retornar un mensaje
    return render_template("login.html")

@app.route("/guardar")
def guardar():
    return "producto agregado correctamente!"

@app.route("/login")
def login():
    return render_template("login.html")

@app.route("/logout")
def logout():
    return redirect("/login")



# Ejecutar el proyecto en el puerto 5000
if __name__ == "__main__":
    app.run(port=5000)