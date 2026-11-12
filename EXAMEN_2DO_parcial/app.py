from flask import Flask, render_template, request, redirect, url_for, flash
import mysql.connector

app = Flask(__name__)
app.secret_key = "mi_clave_secreta"

def conectar():
    return mysql.connector.connect(
        host="localhost",
        user="root",
        password="",
        database="crud_autos"
    )

@app.route('/')
def index():
    conexion = conectar()
    cursor = conexion.cursor(dictionary=True)
    cursor.execute("SELECT * FROM tb_autos")
    autos = cursor.fetchall()
    cursor.close()
    conexion.close()
    return render_template('index.html', autos=autos)

@app.route('/guardar', methods=['POST'])
def guardar():
    marca = request.form['txtMarca']
    modelo = request.form['txtModelo']
    color = request.form['txtColor']
    anio = request.form['txtAnio']
    conexion = conectar()
    cursor = conexion.cursor()
    cursor.execute("INSERT INTO tb_autos (marca, modelo, color, anio) VALUES (%s, %s, %s, %s)", (marca, modelo, color, anio))
    conexion.commit()
    cursor.close()
    conexion.close()
    flash("Auto agregado correctamente")
    return redirect(url_for('index'))

@app.route('/editar/<int:id>')
def editar(id):
    conexion = conectar()
    cursor = conexion.cursor(dictionary=True)
    cursor.execute("SELECT * FROM tb_autos WHERE id = %s", (id,))
    auto = cursor.fetchone()
    cursor.close()
    conexion.close()
    return render_template('editarAuto.html', auto=auto)

@app.route('/actualizar/<int:id>', methods=['POST'])
def actualizar(id):
    marca = request.form['txtMarca']
    modelo = request.form['txtModelo']
    color = request.form['txtColor']
    anio = request.form['txtAnio']
    conexion = conectar()
    cursor = conexion.cursor()
    cursor.execute("UPDATE tb_autos SET marca=%s, modelo=%s, color=%s, anio=%s WHERE id=%s", (marca, modelo, color, anio, id))
    conexion.commit()
    cursor.close()
    conexion.close()
    flash("Auto actualizado correctamente")
    return redirect(url_for('index'))

@app.route('/eliminar/<int:id>')
def eliminar(id):
    conexion = conectar()
    cursor = conexion.cursor(dictionary=True)
    cursor.execute("SELECT * FROM tb_autos WHERE id = %s", (id,))
    auto = cursor.fetchone()
    cursor.close()
    conexion.close()
    return render_template('eliminarAuto.html', auto=auto)

@app.route('/borrar/<int:id>', methods=['POST'])
def borrar(id):
    conexion = conectar()
    cursor = conexion.cursor()
    cursor.execute("DELETE FROM tb_autos WHERE id = %s", (id,))
    conexion.commit()
    cursor.close()
    conexion.close()
    flash("Auto eliminado correctamente")
    return redirect(url_for('index'))

if __name__ == '__main__':
    app.run(debug=True)