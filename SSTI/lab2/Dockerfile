FROM python:3.9-slim

WORKDIR /var/www/html

RUN pip install Flask==2.2.4 Jinja2==3.1.2

COPY ./src /var/www/html

CMD ["python", "app.py"]

RUN echo "Flag: {LAB-Template-002}" >> /etc/passwd