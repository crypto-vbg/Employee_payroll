DELIMITER $$
CREATE PROCEDURE type_division (
	INOUT type_list varchar(4000)
)
BEGIN
	DECLARE finished INTEGER DEFAULT 0;
	DECLARE type varchar(100) DEFAULT "";

	-- declare cursor for employee email
	DEClARE cur_for_division
		CURSOR FOR
			SELECT division FROM employee;

	-- declare NOT FOUND handler
	DECLARE CONTINUE HANDLER
        FOR NOT FOUND SET finished = 1;

	OPEN cur_for_division;

	get_cur_division: LOOP
		FETCH cur_for_division INTO type;
		IF finished = 1 THEN
			LEAVE get_cur_division;
		END IF;
		-- build email list
		SET type_list = CONCAT(type,";",type_list);
	END LOOP get_cur_division;
	CLOSE cur_for_division;

END$$
DELIMITER ;


SET @type_list = "";
CALL type_division(@type_list);
SELECT @type_list;
