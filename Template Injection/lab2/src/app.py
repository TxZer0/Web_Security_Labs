from flask import Flask, request, render_template_string, render_template

app = Flask(__name__)

def validate(input):
    input = input.replace('{{', '').replace('}}', '')
    input = input.replace('__', '')
    input = input.replace('[]','')
    return input

@app.route("/")
def index():
    key = request.args.get('keyword')
    output = '' 
    if key:
        try:
            output = render_template_string(validate(key))
        except Exception as e:
            output = f"Something went wrong"
    return render_template("index.html", key=output)

if __name__ == "__main__":
    app.run(host="0.0.0.0", port=5000, debug=True)
