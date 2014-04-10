DELIMITER $$

DROP TRIGGER `users_update_trigger`$$

CREATE TRIGGER `users_update_trigger` AFTER UPDATE ON `users`
 FOR EACH ROW BEGIN
    IF (NEW.landline != OLD.landline) THEN
        INSERT INTO audit_log 
        VALUES 
            (NULL
            , NOW()
            , IFNULL(@user_id, 0)
            , 'My Account'
            , 'landline'
            , OLD.landline
            , NEW.landline);
    END IF;
    IF (NEW.mobile != OLD.mobile) THEN
        INSERT INTO audit_log 
        VALUES 
            (NULL
            , NOW()
            , IFNULL(@user_id, 0)
            , 'My Account'
            , 'mobile'
            , OLD.mobile
            , NEW.mobile);
    END IF;
    IF (NEW.email != OLD.email) THEN
        INSERT INTO audit_log 
        VALUES 
            (NULL
            , NOW()
            , IFNULL(@user_id, 0)
            , 'My Account'
            , 'email'
            , OLD.email
            , NEW.email);
    END IF;
END$$

DELIMITER ;