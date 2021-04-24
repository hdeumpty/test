INSERT IGNORE INTO `membres` (`Login`, `NomComplet`, `Prenom`, `Nom`, `Role`) 
SELECT wp_users.user_login, wp_users.display_name, FN.meta_value, LN.meta_value, R.meta_value
FROM wp_users 
JOIN (SELECT user_id, meta_key, meta_value FROM wp_usermeta WHERE meta_key='first_name') FN ON wp_users.ID = FN.user_id
JOIN (SELECT user_id, meta_key, meta_value FROM wp_usermeta WHERE meta_key='last_name') LN ON wp_users.ID = LN.user_id
LEFT JOIN (SELECT user_id, meta_key, meta_value FROM wp_usermeta WHERE meta_key='role') R ON wp_users.ID = R.user_id
;
