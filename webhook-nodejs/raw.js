const http = require("http");

const server = http.createServer((req, res) => {
  const headers = req.headers;
  console.log("headers", headers); // Data headers dari request

  let data = "";

  req.on("data", (chunk) => {
    data += chunk;
  });

  req.on("end", () => {
    console.log(data); // Data dari request
    res.end("Data diterima");
  });
});

server.listen(3000, () => {
  console.log("Server berjalan pada port 3000");
});
