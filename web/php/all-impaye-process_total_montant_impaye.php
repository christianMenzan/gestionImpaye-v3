<?php

    $serverName = "WIN-16XSGUCUL9V"; 
    $database = "gesabeldev";
    $uid = 'sa';
    $pwd = 'P@ssw0rd';

    try {
       $conn = new PDO( "sqlsrv:server=$serverName;Database = $database", $uid, $pwd); 
       $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
    }

    catch( PDOException $e ) {
       die( "Error connecting to SQL Server" ); 
    }

    // Nombre d'abonnés
    $query = "select SUM(Total_Imp_Echu)
             from    liste_abo h,reltournee r,reference..agent f , abonne a, reference..dictables d, tournee t
             where   h.identifiant = a.idabon and
                     codelemt = a.posabon and numtable = '24' and 
                     r.matrrelvr=f.MATRAGENT and
                     substring(h.refbranch, 1,3) = r.codexp and
                     substring(h.refbranch, 5,2) = r.codzone and
                     substring(h.refbranch, 7,3) = r.codtourne 
                     and
                     substring(h.refbranch, 1,3) = t.codexp and
                     substring(h.refbranch, 5,2) = t.codzone and
                     substring(h.refbranch, 7,3) = t.codtourne ";                                    

    echo number_format($conn->query($query, PDO::FETCH_COLUMN, 0)->fetch(), 0, ',', ' ') . " Francs CFA" ; 
    $conn = null;

?>