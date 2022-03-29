const polka = require('polka');
const { json, urlencoded } = require('body-parser');

polka()
  .use(json(), urlencoded({ extended: true }))
  .get('/', (_req, res) => {
		res.writeHead(200, { 'Content-Type': 'application/json' });
		res.end(JSON.stringify({ message: 'Gunakan post method' }));
  })
  .post('/', (req, res) => {
    console.log(req.body)
		res.writeHead(200, { 'Content-Type': 'application/json' });
		res.end(JSON.stringify({ message: 'OK' }));
  })
  .listen(3000, () => {
    console.log(`> Running on localhost:3000`);
  });