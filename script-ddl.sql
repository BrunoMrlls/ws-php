CREATE DATABASE financeiro;


USE financeiro;


CREATE TABLE categoria(
    id INTEGER AUTO_INCREMENT PRIMARY KEY
    , nome VARCHAR(50)
);

 INSERT INTO categoria (nome) VALUES ('Lazer')
                                    , ('Supermercado') 
                                    , ('Farmácia')
                                    , ('Alimentação')
                                    , ('Outros');

CREATE TABLE pessoa(
    id INTEGER AUTO_INCREMENT PRIMARY KEY
    , nome VARCHAR(255)
    , ativo BOOLEAN
    , endereco_id INTEGER
);

INSERT INTO pessoa (nome, ativo, endereco_id) VALUES ('Breno Brito Meireles', true, 1)
                                                    ,('Carlos Alberto Ferreira Meireles', false, 2)
                                                    , ('Maria Ivone Chagas de Brito', true, 3);

CREATE TABLE lancamento (
    id INTEGER AUTO_INCREMENT PRIMARY KEY
    , descricao VARCHAR(255)
    , dt_venc DATE
    , dt_pag DATE
    , valor DECIMAL(10,2)
    , obs VARCHAR(255)
    , categoria_id INTEGER
    , pessoa_id INTEGER
    , tipo enum('DESPESA', 'RECEITA')
    , FOREIGN KEY fk_categoria (categoria_id) 
    REFERENCES categoria(id)
    , FOREIGN KEY fk_pessoa (pessoa_id)
    REFERENCES pessoa(id)
);

INSERT INTO lancamento (descricao, dt_venc, dt_pag, valor, obs, categoria_id, pessoa_id, tipo) VALUES 
('Salário Mensal', '2017-06-10', NULL, 6500.0, 'Distribuição dos lucros', 1, 1, 'RECEITA')
, ('Bahamas', '2017-02-10', '2017-02-10', 100.32, NULL, 2, 2, 'DESPESA')
, ('Top Clube', '2017-06-10', NULL, 120.0, NULL, 3, 3, 'RECEITA')
, ('CEMIG', '2017-02-10', '2017-02-10', 110.4, 'Geração', 3, 3, 'RECEITA')
, ('Eletrônicos', '2017-04-10', '2017-04-10', 2100.65, NULL, 5, 1, 'DESPESA');


CREATE TABLE endereco (
    id INTEGER AUTO_INCREMENT PRIMARY KEY
    , logradouro VARCHAR(255)
    , numero VARCHAR(10)
    , complemento VARCHAR(255)
    , bairro VARCHAR(50)
    , cidade VARCHAR(50)
    , estado VARCHAR(50)
    , cep VARCHAR(7)
    , pessoa_id INTEGER
    , FOREIGN KEY fk_pessoa (pessoa_id) 
    REFERENCES pessoa(id) ON DELETE CASCADE
);

INSERT INTO endereco (logradouro, numero, complemento, bairro, cidade, estado, cep, pessoa_id) VALUES
('Pass. São jorge', '140', NULL, 'Telégrafo', 'Belém', 'Pará', '6611339', 1)
, ('Rua Santa Izabem', 'A652', 'Ed. Lares doce', 'Umarizal', 'Belém', 'Pará', '6611300', 2)
, ('Conj. Heliolandia Rua D', '998', 'Na frente do supermercado Bom Gosto', 'Distrito Industrial', 'Ananindeua', 'Pará', '7812613', 3);