const polka = require("polka");
const { json, urlencoded, text } = require("body-parser");

polka()
  .use(json(), urlencoded({ extended: true }))
  .get("/", (_req, res) => {
    res.writeHead(200, { "Content-Type": "application/json" });
    res.end(JSON.stringify({ message: "Gunakan post method" }));
  })
  .post("/", (req, res) => {
    console.log(req.body);
    res.writeHead(200, { "Content-Type": "application/json" });
    res.end(JSON.stringify({ message: "OK" }));
  })
  .use(text({ type: "application/soap+xml" }))
  .post("/soap", (req, res) => {
    console.log(req.body);

    res.writeHead(200, { "Content-Type": "text/xml" });
    res.end(
      '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:bpjs="http://www.example.com/SampleService"><soapenv:Body><bpjs:SampleResponse><output>OK</output></bpjs:SampleResponse></soapenv:Body></soapenv:Envelope>'
    );
  })
  .listen(3000, () => {
    console.log(`> Running on localhost:3000`);
  });
