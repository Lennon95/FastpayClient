# FastpayClient
Client de consulta de vendas à API da Fastpay

## Dependências e execução de testes
Recomenda-se utilizar tanto o `composer` quanto o `phpunit` por meio das suas imagens oficiais do Docker.
Com a ferramenta instalada, para instalar as dependências basta executar o seguinte comando:
```
docker run --rm --interactive --tty \                                                                                               
--volume $PWD:/app \
composer update
```
Da mesma forma, para executar os testes, basta trocar o comando `update` por `test`
```
docker run --rm --interactive --tty \                                                                                               
--volume $PWD:/app \
composer test
```
# Docs
[Ver documentação](docs/README.md)