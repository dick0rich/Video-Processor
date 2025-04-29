import subprocess
from flask import Flask, Response, request, send_from_directory, redirect
import os

app = Flask(__name__, static_folder='./')

@app.route('/')
def index():
    return serve_php('index.php')

@app.route('/terms.php')
def terms():
    return serve_php('terms.php')

@app.route('/privacy.php')
def privacy():
    return serve_php('privacy.php')

@app.route('/<path:path>')
def serve_static(path):
    if path.endswith('.php'):
        return serve_php(path)
    return send_from_directory('./', path)

def serve_php(php_file):
    try:
        # Run the PHP file using subprocess
        process = subprocess.Popen(
            ['php', php_file],
            stdout=subprocess.PIPE,
            stderr=subprocess.PIPE
        )
        stdout, stderr = process.communicate()
        if process.returncode != 0:
            return f"Error executing PHP: {stderr.decode('utf-8')}", 500
        
        # Return the PHP output
        return Response(stdout, mimetype='text/html')
    except Exception as e:
        return f"Error: {str(e)}", 500

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000, debug=True)
