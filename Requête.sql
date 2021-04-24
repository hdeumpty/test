SELECT wp_users.ID AS 'ID', wp_users.user_login AS 'LOGIN', wp_users.display_name 'NOM COMPLET', FN.meta_value AS 'PRENOM', LN.meta_value AS 'NOM', R.meta_value AS 'ROLE'
FROM wp_users 
JOIN (SELECT user_id, meta_key, meta_value FROM wp_usermeta WHERE meta_key='first_name') FN ON wp_users.ID = FN.user_id
JOIN (SELECT user_id, meta_key, meta_value FROM wp_usermeta WHERE meta_key='last_name') LN ON wp_users.ID = LN.user_id
LEFT JOIN (SELECT user_id, meta_key, meta_value FROM wp_usermeta WHERE meta_key='role') R ON wp_users.ID = R.user_id
ORDER BY user_login ASC;
