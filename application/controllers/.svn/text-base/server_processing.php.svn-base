<?php 

function server_processing(){
   /*
    * Script:    DataTables server-side script for PHP and MySQL
    * Copyright: 2010 - Allan Jardine
    * License:   GPL v2 or BSD (3-point)
    */
   $aColumns = array(
     'regina_dslams.id', // 0
     'regie_prio',       // 1 etc
     'regie_dslam',
     'title', //'regie_dslam_type_id',
     'regie_enummer', 
     'regie_uitgifte_bsse', //DATE_FORMAT(regie_uitgifte_bsse,"%m-%d")',
     'regie_commissioning',
     'regie_tti',
     'regie_opm',
     'iptv_status.name AS iptv_status', //'regie_status_iptv',
     'wba_status.name AS wba_status', //regie_status_wba',
     'regina_dslams.created AS created',
     'regina_dslams.updated AS updated',
     'u.username AS username'
        
   );
    
   /* Indexed column (used for fast and accurate table cardinality) */
   $sIndexColumn = "regina_dslams.id";
 
   /* DB table to use */
   $sTable = "regina_dslams";
 
   // Joins
   $sJoin = 'LEFT JOIN users u ON u.id = regina_dslams.user_id ';
   $sJoin .= 'LEFT JOIN regina_dslam_types ON regina_dslam_types.id = regina_dslams.regie_dslam_type_id ';
   $sJoin .= 'LEFT JOIN regina_statuses iptv_status ON iptv_status.id = regina_dslams.regie_status_iptv_id ';
   $sJoin .= 'LEFT JOIN regina_statuses wba_status ON wba_status.id = regina_dslams.regie_status_wba_id ';
    
   // get the database credentials from the configfile
   $database = new DATABASE_CONFIG;
   $db = get_class_vars(get_class($database));
    
     /* MySQL connection */
   $gaSql['user']       = $db['default']['login'];
   $gaSql['password']   = $db['default']['password'];
   $gaSql['db']         = $db['default']['database'];
   $gaSql['server']     = $db['default']['host']; 
    
   // for html links
   App::import('Helper', 'Html');
   $html = new HtmlHelper();
    
   // get or post
   $_METHOD = $_POST;
   /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
    * If you just want to use the basic configuration for DataTables with PHP server-side, there is
    * no need to edit below this line
    */
 
   $gaSql['link'] =  mysql_pconnect( $gaSql['server'], $gaSql['user'], $gaSql['password']  ) or
     die( 'Could not open connection to server' );
 
   mysql_select_db( $gaSql['db'], $gaSql['link'] ) or
     die( 'Could not select database '. $gaSql['db'] );
 
   $sLimit = "";
   if ( isset( $_METHOD['iDisplayStart'] ) && $_METHOD['iDisplayLength'] != '-1' )
   {
     $sLimit = "LIMIT ".mysql_real_escape_string( $_METHOD['iDisplayStart'] ).", ".
       mysql_real_escape_string( $_METHOD['iDisplayLength'] );
   }
 
   if ( isset( $_METHOD['iSortCol_0'] ) )
   {
     $sOrder = "ORDER BY  ";
     for ( $i=0 ; $i<intval( $_METHOD['iSortingCols'] ) ; $i++ )
     {
       if ( $_METHOD[ 'bSortable_'.intval($_METHOD['iSortCol_'.$i]) ] == "true" )
       {
         $sFieldname = $aColumns[ intval( $_METHOD['iSortCol_'.$i] ) ];
         if(strpos($sFieldname, " AS ") !== false) {
           $arr = split(" ", $sFieldname);
           $sFieldname = $arr[0];
         }         
         $sOrder .= $sFieldname . "
           ".mysql_real_escape_string( $_METHOD['sSortDir_'.$i] ) .", ";
       }
     }
 
     $sOrder = substr_replace( $sOrder, "", -2 );
     if ( $sOrder == "ORDER BY" )
     {
       $sOrder = "";
     }
   }
 
   $sWhere = "";
   if ( $_METHOD['sSearch'] != "" )
   {
     $sWhere = "WHERE (";
     for ( $i=0 ; $i<count($aColumns) ; $i++ )
     {
       $sFieldname = $aColumns[$i]; // iptv_uitgezet.username AS iptv_uitgezet
       if(strpos($sFieldname, " AS ") !== false) {
         $arr = split(" ", $sFieldname);
         $sFieldname = $arr[0];
       }
       $sWhere .= $sFieldname." LIKE '%".mysql_real_escape_string( $_METHOD['sSearch'] )."%' OR ";
     }
     $sWhere = substr_replace( $sWhere, "", -3 );
     $sWhere .= ')';
   }
 
   /* Individual column filtering */
   for ( $i=0 ; $i<count($aColumns) ; $i++ )
   {
     if ( $_METHOD['bSearchable_'.$i] == "true" && $_METHOD['sSearch_'.$i] != '' )
     {
       if ( $sWhere == "" )
       {
         $sWhere = "WHERE ";
       }
       else
       {
         $sWhere .= " AND ";
       }
       $sFieldname = $aColumns[$i];
       if(strpos($sFieldname, " AS ") !== false) {
         $arr = split(" ", $sFieldname);
         $sFieldname = $arr[0];
       }
       $sWhere .= $sFieldname." LIKE '%".mysql_real_escape_string($_METHOD['sSearch_'.$i])."%' ";
     }
   }
 
 
   /*
    * SQL queries
    * Get data to display
    */
   $sQuery = "
     SELECT SQL_CALC_FOUND_ROWS ".str_replace(" , ", " ", implode(", ", $aColumns))."
     FROM   $sTable
     $sJoin
     $sWhere
     $sOrder
     $sLimit
   ";
   $sDataQuery = $sQuery;
   $rResult = mysql_query( $sQuery, $gaSql['link'] ) or die(mysql_error());
 
   /* Data set length after filtering */
   $sQuery = "
     SELECT FOUND_ROWS()
   ";
   $rResultFilterTotal = mysql_query( $sQuery, $gaSql['link'] ) or die(mysql_error());
   $aResultFilterTotal = mysql_fetch_array($rResultFilterTotal);
   $iFilteredTotal = $aResultFilterTotal[0];
 
   /* Total data set length */
   $sQuery = "
     SELECT COUNT(".$sIndexColumn.")
     FROM   $sTable
   ";
   $rResultTotal = mysql_query( $sQuery, $gaSql['link'] ) or die(mysql_error());
   $aResultTotal = mysql_fetch_array($rResultTotal);
   $iTotal = $aResultTotal[0];
 
 
   /*
    * Output
    */
   $output = array(
     "sEcho" => intval($_METHOD['sEcho']),
     "iTotalRecords" => $iTotal,
     "iTotalDisplayRecords" => $iFilteredTotal,
     "aaData" => array(),
     "sQuery" => $sDataQuery
   );
 
   while ( $aRow = mysql_fetch_array( $rResult ) )
   {
     $row = array();
     for ( $i=0 ; $i<count($aColumns) ; $i++ )
     {
       if(strpos($aColumns[$i], " AS ") !== false) {
         $arr = split(" ", $aColumns[$i]);
         $row[] = $this->truncate( $aRow[ $arr[2] ], 20);
       }
       else if ( $aColumns[$i] == "version" )
       {
         /* Special output formatting for 'version' column */
         $row[] = ($aRow[ $aColumns[$i] ]=="0") ? '-' : $aRow[ $aColumns[$i] ];
       }
       else if ( $aColumns[$i] != ' ' )
       {
         /* General output */
         if($aColumns[$i]=="regina_dslams.id") {
           $row[] = $html->link('edit', '/regina_dslams/edit/'.$aRow[ 'id' ] );
         } else {
         $row[] = $this->truncate($aRow[ $aColumns[$i] ], 20); // truncate long results
         }
       }
     }
     $output['aaData'][] = $row;
   }
 
   echo json_encode( $output );
   exit();
 }

 ?>