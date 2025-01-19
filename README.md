# Ilia Challenge

Inicialmente, minha ideia era trazer 3 opções para testes da funcionalidade: 

- Este repositório, apenas com o Symfony, usando a API requerida;
- Este repositório, usando um banco de dados externo (hospedado na hostinger);
- https://github.com/SamusTeix/ilia_challenge_docker <- este repositório, dockerizado, com o Symfony, Nginx, Mysql e RabbitMq;

## O que está funcionando:

Finalizei a solicitação neste repositório, utilizado o ```symfony serve```. Este, entrega a funcionalidade solicitada (exibição da lista de Cards e de informações do Card).
Além disto, adicionei uma seção de filtros, paginador e um controlador de itens por página.

Foram criados os testes das Entities, dos Controllers e dos Services;

Para testes:

```bash
git clone git@github.com:SamusTeix/ilia_challenge.git
cd ilia_challenge
composer install
symfony serve -d
```

Para testes com o Docker:

```bash
git clone git@github.com:SamusTeix/ilia_challenge_docker.git
cd ilia_challenge_docker
docker compose up -d
```

## O que NÃO está funcionando:

O Banco de dados (hoshtinger) está migrado e funcionando (https://auth-db1525.hstgr.io/index.php?route=/, user "u183880556_tcg_user", senha "i98t:4;1*E"), relations testadas e funcionais. A grande questão para esta parte estar 100% foi o tempo.
A ideia original era:

- Ao subir o Kernel, iniciar uma Message, que trabalharia como um Job. Esta, enfileraria as tabelas a serem populadas e enviaria ao RabbitMq.
- Até o RabbitMq fazer a devolutiva de "FINALIZADO", o sistema consultaria a API. A partir do banco populado, passaria a buscar do DB.
