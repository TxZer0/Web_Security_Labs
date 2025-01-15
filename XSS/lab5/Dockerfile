FROM node:23.5.0

WORKDIR /app

COPY package*.json ./

RUN npm install

COPY ./src ./src

EXPOSE 9000

CMD ["npm", "start"]
