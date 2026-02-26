const http = require('http');

const port = 8080;

const server = http.createServer((req, res) => {
    if (req.url === '/home') {
         res.writeHead(200, {'Content-Type': 'text/html'});
         res.end('<h1>Olá mundo!</h1>');
    }

    if (req.url === '/users') {
        const users = [
            {
                name: 'Gabriel',
                email: 'gabriel@email.com'
            },
            {
                name: 'Maria', 
                email: 'maria@email.com'
            },
            {
                name: 'João', 
                email: 'joao@email.com'
            }
        ];

        res.writeHead(200, {'Content-Type': 'application/json'});
        res.end(JSON.stringify(users));
    }

server.listen(port, () => console.log(`rodando da porta ${port }!`)); });