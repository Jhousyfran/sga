# G.S.A Desafio Técnico
<br>
![Tela](https://github.com/Jhousyfran/sga/blob/master/public/images/screenshot_init.png)

#### O Desafio

* Desenvolver uma SPA de cadastro de produtos e fornecedores.
* O cadastro do fornecedor deverá conter os campos (nome, cnpj, endereço completo), o endereço deverá ser completado automaticamente através de um API pública de busca de CEPs. O produto deverá ter os campos (nome, quantidade e descrição)
* O sistema deverá conter um login JWT do fornecedor, de forma que o mesmo ao realizar o login veja apenas os produtos que foram cadastrados por ele.
* A aplicação deverá estar dentro de um container Docker.
* A API deverá ser desenvolvida em Laravel, versão 6+
* O SPA poderá ser desenvolvido em VueJS ou React.

#### Tecnlogias Usadas

* Laravel
* Vuejs
* Docker
* MySQL

#### Como rodar

Antes de seguir os passos abaixo tenha certeza que o **docker** e **docker-compose** instalado na maquina. Para rodar este projeto:

1\. Clone este repositorio e entre na pasta

```
git clone https://github.com/Jhousyfran/sga.git
cd sga
```

2\. Copie o arquivo de exemplo para criar o arquivo de  configurações

```
cp .env-example .env
```

3\. Faça o build dos containers \(o container o **web** vai usar a porta 8000 e container db irá usar a porta 3388, certifique-se que essas portas estejam livre antes de continuar).

```
docker-compose up -d
```

4\. Instale as dependências

```
docker-compose run web composer install
docker-compose run node npm install
```

5\. Faça o build do JS do front\-end da aplicacao

```
docker-compose run node npm run prod
```

6. Gere uma nova chave para o arquivo de configuração do laravel (.env) e der as permissões necessárias

```
docker-compose run web php artisan key:generate
docker-compose run web chmod 775 bootstrap/cache/
docker-compose run web chmod 777 storage/
```

5\. Execute as migrations

```
docker-compose run web php artisan migrate
```

6\. Agora você pode acessar aplicação em [localhost:8000 ou clique aqui!](http://localhost:8000)