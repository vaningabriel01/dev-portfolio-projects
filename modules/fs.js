const fs = require('fs');
const path = require('path');

//criar uma pasta 
// fs.mkdir(path.join(__dirname, 'test'), (err) => {
//     if(err) {
//        return console.log('Erro: ', err);
//     }
//     console.log('Pasta criada com sucesso!');
// });

//criar um arquivo
fs.writeFile(path.join(__dirname, 'test', 'test.txt'), 'Olá mundo!', (err) => {
    if(err) {
        return console.log('Erro: ', err);
    }   
    console.log('Arquivo criado com sucesso!');
});

// adicionar conteúdo a um arquivo
fs.appendFile(path.join(__dirname, 'test', 'test.txt'), '\nOlá mundo novamente!', (err) => {
    if(err) { 
        return console.log('Erro: ', err);
    }
    console.log('Arquivo atualizado com sucesso!');
});

// ler um arquivo
fs.readFile(path.join(__dirname, './test', 'test.txt'), 'utf-8', (err, data) => {
    if(err) {
        return console.log('Erro: ', err);
    }
    console.log(data);
});