const express = require('express');
const UserModel = require('../src/models/user.model');
const app = express();

app.use(express.json());



app.get('/users', async (req, res) => {
    try {
        const users = await UserModel.find({});
        res.status(200).json(users);
} catch (error) {   
     res.status(500).send({message:error.message});
}
});

app.get('/users/:id', async (req, res) => {
    try {
        const {id} = req.params.id;

        const user = await UserModel.findById(id);

        return res.status(200).json(user);
    } catch (error) {
        return res.status(500).send({message:error.message});
    }
});

app.post('/users', async (req, res) => {
  try {
    const user = await UserModel.create(req.body)
    res.status(201).json(user)
  } catch (error) {
    console.error(error)

    if (error.name === 'ValidationError') {
      return res.status(400).json({ error: error.message })
    }

    if (error.name === 'CastError') {
      return res.status(400).json({ error: 'ID inválido' })
    }

    res.status(500).json({ error: 'Erro interno do servidor' })
  }
});

app.patch('/users/:id', async (req, res) => {
    try {
        const id = req.params.id;
        const user = await UserModel.findByIdAndUpdate(id, req.body)

        return res.status(200).json(user);
    } catch (error) {
        res.status(500).send({message:error.message});
    }
});

app.delete('/users/:id', async (req, res) => {
    try {
        const id = req.params.id;
        user = await UserModel.findByIdAndDelete(id);
        res.status(200).json({message: "Usuário deletado com sucesso"});

    } catch (error) {
        res.status(500).send({message:error.message});
    }
});
const port = 3000;

app.listen(port, () => console.log(`rodando com express na porta ${port}`));
