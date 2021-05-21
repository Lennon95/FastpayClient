# Estrutura

* O diagrama UML das classes pode ser visto em [aqui](uml.jpg)
* As classes `Venda`, `Cliente`, `Parcela` e `ConsultaVenda` sao [DTOs](https://en.wikipedia.org/wiki/Data_transfer_object) e, por isso, sao imutaveis
* Todos os DTOs implementam a interface [`FactoryMethod`](https://refactoring.guru/pt-br/design-patterns/factory-method) precisamente para padronizar a forma de aplicar o padrão de projeto em questão

### Cliente da API

* A `APIClient` é a classe que, de fato, realiza a comunicação com a API da Fastpay.
* Na construção, recebe as informações necessárias para se conectar à API, sendo os valores
  default a URL de base do ambiente de Sandbox e suas respectivas credenciais:
  ```
  string $baseUri = 'https://api-sandbox.fpay.me',
  string $clientCode = 'FC-SB-15',
  string $clientKey = '6ea297bc5e294666f6738e1d48fa63d2'
  ```
* Seu construtor não possui parâmetros obrigatórios
* A dependência `GuzzleHttp\Client` é o cliente HTTP usado para enviar e receber as requisições
* O `GuzzleHttp\Client` é criado pela classe no construtor com base na `$baseUri` informada;
  no entanto, é possível, via setter, sobrescrever o cliente HTTP. Essa possibilidade permite
  passar um objeto com um `GuzzleHttp\Handler\MockHandler`, [que serve de mock para testes na camada HTTP
  da dependência](https://docs.guzzlephp.org/en/stable/testing.html).


