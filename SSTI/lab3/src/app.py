from flask import Flask, request
from flask_mako import MakoTemplates, render_template
from mako.template import Template

app = Flask(__name__)
app.config['MAKO_TEMPLATES_AUTO_RELOAD'] = True
mako = MakoTemplates(app)


def caesar_encrypt(plaintext, shift):
    encrypted_text = ""
    for char in plaintext:
        if char.isalpha():
            start = ord('A') if char.isupper() else ord('a')
            encrypted_char = chr((ord(char) - start + shift) % 26 + start)
            encrypted_text += encrypted_char
        else:
            encrypted_text += char
    return encrypted_text

def getResult(text, action, shift): 
    results = []
    result = ''
    if action == "encrypt":
        result = caesar_encrypt(text, shift)
    elif action == "decrypt":
        result = caesar_encrypt(text, -shift)
    results.append(f"Shift {shift}: {result}")

    result_html = "<h2>Result:</h2><ul>"
    for result in results:
        result_html += f"<li>{result}</li>"
    result_html += "</ul>"
    return result_html

@app.route('/', methods=["GET", "POST"])
def index():
    result = ''
    try:
        if request.method == "POST":
            text = request.form["text"]
            action = request.form["action"]
            shift = int(request.form["shift"])
            result = Template(getResult(text, action, shift)).render()
    except:
        result = "Something went wrong"
    return render_template('index.html', result = result)

if __name__ == "__main__":
    app.run(debug=True, host="0.0.0.0", port=5001)
    
