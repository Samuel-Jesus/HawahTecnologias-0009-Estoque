-- ---------------------------------------
-- Trasações de INSERÇÃO de dados
-- ---------------------------------------

-- Cadastrando Fornecedores
DELIMITER //
    CREATE PROCEDURE cad_provider(IN nome VARCHAR(45), IN registro VARCHAR(45), IN origem VARCHAR(45), IN contato VARCHAR(30), IN rua VARCHAR(30), IN bairro VARCHAR(20), IN cidade VARCHAR(20), IN estado VARCHAR(20))
        BEGIN
            DECLARE code_fornecedor INT;
            START TRANSACTION;
                INSERT INTO fornecedores (nome, registro, origem) VALUES (nome, registro, origem);
                SET code_fornecedor = LAST_INSERT_ID();
                INSERT INTO contatos (contato, id_fornecedor) VALUES (contato, code_fornecedor);
                INSERT INTO enderecos (rua, bairro, cidade, estado, id_fornecedor) VALUES (rua, bairro, cidade, estado, code_fornecedor);
            COMMIT;
        END; 
        //
DELIMITER ;
-- -----------------------------------------------------------------------------
CALL cad_provider('Fonecedor', '25646454653', 'Brasil', '71984541254', 'Silvertino','Torresmo', 'Salvador','BAhia');

-- Cadastrando Produtos
DELIMITER //
    CREATE PROCEDURE cad_products(IN code INT, IN nome VARCHAR(45), IN valor DECIMAL(8,2), IN qtt INT, IN descri VARCHAR(100), IN cor VARCHAR(20), IN id_marca INT, IN id_categoria INT, IN id_fornecedor INT, IN id_status INT)
        BEGIN
            START TRANSACTION;
                INSERT INTO produtos (code, nome, valor, quantidade, descricao, cor, id_marca, id_categoria, id_fornecedor, id_status) 
                VALUES (code, nome, valor, qtt, descri, cor, id_marca, id_categoria, id_fornecedor, id_status);
            COMMIT;
        END; 
        //
DELIMITER ;
-- ------------------------------------------------------------------------------
CALL cad_products('0241854', 'Capa', '10,20', '20', 'CApa com detalhes de ouro','Preto', 1,1,1,1);

-- ---------------------------------------
-- Trasações de SELEÇÂO de dados
-- ---------------------------------------

-- Chamando os dados de fornecedor
DELIMITER //
    CREATE PROCEDURE show_fornecedores()
        BEGIN
            START TRANSACTION;
                SELECT * FROM contatos;
                SELECT * FROM enderecos;
                SELECT * FROM fornecedores;
            COMMIT;
        END; 
        //
DELIMITER ;