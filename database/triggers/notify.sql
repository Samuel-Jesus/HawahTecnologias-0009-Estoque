

delimiter //
CREATE TRIGGER notify_fornecedores
AFTER {[INSERT],[UPDATE],[DELETE]}
[NOT  FOR  REPLICATION]
    ON fornecedores
FOR EACH ROW
BEGIN
    INSERT INTO notificacoes (acao, descricao, lido, id_user, at_create, at_update) 
    VALUES ("REMOVEU", "Adicionou novo Fornecedor", 0, 1, current_timestamp(), current_timestamp());
END //
delimiter;
