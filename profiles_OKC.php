<?PHP
	
// Connecting, selecting database
$link = mysql_connect('localhost:3306', 'root', 'root')
    or die('Could not connect: ' . mysql_error());
echo 'Connected successfully';
mysql_select_db('profiles_OKC') or die('Could not select database');

// Performing SQL query
//$query = 'SELECT * FROM chicks';

if(isset($_GET["w1"]) && isset($_GET["w2"])){
	$profile = $_GET["w1"];
	$match = $_GET["w2"];

	// ---------------------
	// GET COUNT
	// ---------------------
	$query = "SELECT COUNT(*) FROM profiles_OKC.chicks";
	$result = mysql_query($query) or die('Query failed: ' . mysql_error());
	$count = mysql_result($result, 0);
	echo "<br>";
	echo "<br>";
	echo $count;
	echo "<br>";
	echo "<br>";
	$count = $count + 1;

	// Free resultset
	mysql_free_result($result);

	// ---------------------
	// ADJUST AUTO_INCREMENT
	// ---------------------
	$query = "ALTER TABLE profiles_OKC.chicks AUTO_INCREMENT = $count";
	$result = mysql_query($query) or die('Query failed: ' . mysql_error());

	// Printing results in HTML
	echo "<table>\n";
	while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
	    echo "\t<tr>\n";
	    foreach ($line as $col_value) {
	        echo "\t\t<td>$col_value</td>\n";
	    }
	    echo "\t</tr>\n";
	}
	echo "</table>\n";

	// Free resultset
	mysql_free_result($result);

	// ---------------------
	// INSERT ROW
	// ---------------------
	$query = "INSERT INTO profiles_OKC.chicks (profile_id, match_percentage, number_of_visits, first_visited, last_visited) VALUES ('$profile', '$match', '1', NOW(), NOW()) ON DUPLICATE KEY UPDATE last_visited=CURRENT_TIMESTAMP, match_percentage='$match', number_of_visits=number_of_visits+1";
	$result = mysql_query($query) or die('Query failed: ' . mysql_error());
	echo "<br>";
	echo "<br>";
	// Printing results in HTML
	echo "<table>\n";
	while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
	    echo "\t<tr>\n";
	    foreach ($line as $col_value) {
	        echo "\t\t<td>$col_value</td>\n";
	    }
	    echo "\t</tr>\n";
	}
	echo "</table>\n";

	// Free resultset
	mysql_free_result($result);


}

// Closing connection
mysql_close($link);

?>
