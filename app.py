from flask import Flask, render_template, request, redirect, url_for
import mysql.connector

app = Flask(__name__)

# Configuración de la base de datos
db_config = {
    'host': 'danielvila.000webhostapp.com',
    'user': 'id22349349_daniel',
    'password': 'Dani123$',
    'database': 'id22349349_dashboard'
}

# Conectar a la base de datos
def get_db_connection():
    conn = mysql.connector.connect(**db_config)
    return conn

@app.route('/')
def index():
    conn = get_db_connection()
    cursor = conn.cursor(dictionary=True)
    cursor.execute('SELECT * FROM wifi')
    wifi_list = cursor.fetchall()
    cursor.close()
    conn.close()
    return render_template('index.html', wifi_list=wifi_list)

@app.route('/create', methods=['POST'])
def create():
    ssid = request.form['ssid']
    password = request.form['password']
    conn = get_db_connection()
    cursor = conn.cursor()
    cursor.execute('INSERT INTO wifi (ssid, password) VALUES (%s, %s)', (ssid, password))
    conn.commit()
    cursor.close()
    conn.close()
    return redirect(url_for('index'))

@app.route('/update_form/<int:id>', methods=['GET'])
def update_form(id):
    conn = get_db_connection()
    cursor = conn.cursor(dictionary=True)
    cursor.execute('SELECT * FROM wifi WHERE id=%s', (id,))
    wifi = cursor.fetchone()
    cursor.close()
    conn.close()
    return render_template('update_form.html', wifi=wifi)

@app.route('/update/<int:id>', methods=['POST'])
def update(id):
    ssid = request.form['ssid']
    password = request.form['password']
    conn = get_db_connection()
    cursor = conn.cursor()
    cursor.execute('UPDATE wifi SET ssid=%s, password=%s WHERE id=%s', (ssid, password, id))
    conn.commit()
    cursor.close()
    conn.close()
    return redirect(url_for('index'))

@app.route('/delete/<int:id>', methods=['POST'])
def delete(id):
    conn = get_db_connection()
    cursor = conn.cursor()
    cursor.execute('DELETE FROM wifi WHERE id=%s', (id,))
    conn.commit()
    cursor.close()
    conn.close()
    return redirect(url_for('index'))

@app.route('/read/<int:id>')
def read(id):
    conn = get_db_connection()
    cursor = conn.cursor(dictionary=True)
    cursor.execute('SELECT * FROM wifi WHERE id=%s', (id,))
    wifi = cursor.fetchone()
    cursor.close()
    conn.close()
    return render_template('read_single.html', wifi=wifi)

if __name__ == '__main__':
    app.run(debug=True)
