FROM python:3.9-slim

WORKDIR /var/www/html

RUN pip install Flask==2.0.0 Werkzeug==2.0.0 mako==1.2.4 flask_mako

COPY ./src /var/www/html

CMD ["python", "app.py"]
