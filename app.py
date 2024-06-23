import os
from flask import Flask, jsonify, request, render_template
import pymysql

app = Flask(__name__)

# Configuración de la conexión a la base de datos MySQL
db_host = 'localhost'
db_user = 'id22349349_daniel'
db_password = 'Dani123$'
db_name = 'id22349349_dashboard'

# Función para establecer la conexión a la base de datos
def get_db_connection():
    return pymysql.connect(host=db_host, user=db_user, password=db_password, database=db_name)

# Ruta para servir el archivo index.html desde el directorio templates
@app.route('/')
def index():
    return render_template('index.html')

# Ruta para insertar datos en la base de datos
@app.route('/insertar', methods=['POST'])
def insertar():
    try:
        nombre = request.form['nombre']
        colonia = request.form['colonia']
        alcaldia = request.form['alcaldia']
        latitud = request.form['latitud']
        longitud = request.form['longitud']
        puntos_de_acceso = request.form['puntos_de_acceso']
        programa = request.form['programa']
        costo_punto = request.form['costo_punto']
        retorno_inv = request.form['retorno_inv']

        conn = get_db_connection()
        cursor = conn.cursor()
        sql = "INSERT INTO wifi (Nombre, Colonia, Alcaldia, Latitud, Longitud, Puntos_de_acceso, Programa, Costo_punto, Retorno_inv) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)"
        cursor.execute(sql, (nombre, colonia, alcaldia, latitud, longitud, puntos_de_acceso, programa, costo_punto, retorno_inv))
        conn.commit()
        conn.close()

        return jsonify({'message': 'Registro insertado correctamente'})

    except Exception as e:
        return jsonify({'error': str(e)}), 500

# Ruta para actualizar datos en la base de datos
@app.route('/actualizar', methods=['POST'])
def actualizar():
    try:
        id = request.form['id']
        nuevo_nombre = request.form['nuevo_nombre']
        nueva_colonia = request.form['nueva_colonia']
        nueva_alcaldia = request.form['nueva_alcaldia']
        nueva_latitud = request.form['nueva_latitud']
        nueva_longitud = request.form['nueva_longitud']
        nuevos_puntos_de_acceso = request.form['nuevos_puntos_de_acceso']
        nuevo_programa = request.form['nuevo_programa']
        nuevo_costo_punto = request.form['nuevo_costo_punto']
        nuevo_retorno_inv = request.form['nuevo_retorno_inv']

        conn = get_db_connection()
        cursor = conn.cursor()
        sql = "UPDATE wifi SET Nombre=%s, Colonia=%s, Alcaldia=%s, Latitud=%s, Longitud=%s, Puntos_de_acceso=%s, Programa=%s, Costo_punto=%s, Retorno_inv=%s WHERE id=%s"
        cursor.execute(sql, (nuevo_nombre, nueva_colonia, nueva_alcaldia, nueva_latitud, nueva_longitud, nuevos_puntos_de_acceso, nuevo_programa, nuevo_costo_punto, nuevo_retorno_inv, id))
        conn.commit()
        conn.close()

        return jsonify({'message': 'Registro actualizado correctamente'})

    except Exception as e:
        return jsonify({'error': str(e)}), 500

# Ruta para eliminar datos en la base de datos
@app.route('/eliminar', methods=['POST'])
def eliminar():
    try:
        id = request.form['id']

        conn = get_db_connection()
        cursor = conn.cursor()
        sql = "DELETE FROM wifi WHERE id=%s"
        cursor.execute(sql, (id,))
        conn.commit()
        conn.close()

        return jsonify({'message': 'Registro eliminado correctamente'})

    except Exception as e:
        return jsonify({'error': str(e)}), 500

# Ruta para consultar datos en la base de datos
@app.route('/consultar', methods=['GET'])
def consultar():
    try:
        conn = get_db_connection()
        cursor = conn.cursor()
        sql = "SELECT * FROM wifi"
        cursor.execute(sql)
        resultados = cursor.fetchall()
        conn.close()

        data = [{'id': row[0], 'Nombre': row[1], 'Colonia': row[2], 'Alcaldia': row[3], 'Latitud': row[4], 'Longitud': row[5], 'Puntos_de_acceso': row[6], 'Programa': row[7], 'Costo_punto': row[8], 'Retorno_inv': row[9]} for row in resultados]
        return jsonify(data)

    except Exception as e:
        return jsonify({'error': str(e)}), 500

if __name__ == '__main__':
    port = int(os.environ.get('PORT', 5000))
    app.run(debug=True, host='0.0.0.0', port=port)
