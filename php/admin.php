<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ezon admin</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="lab las la-accusoft"></span><span>Ezon Solar Tracker</span></h2>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="" class="active"><span class="las la-igloo"></span>
                        <span>Dashboard</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-users"></span>
                        <span>Customers</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-clipboard-list"></span>
                        <span>Projects</span></a>
                </li>
              
                <li>
                    <a href=""><span class="las la-receipt"></span>
                        <span>Inventory</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-user-circle"></span>
                        <span>Accounts</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-clipboard-list"></span>
                        <span>Tasks</span></a>
                </li>
            </ul>
        </div>
    </div>
<div class="main-content">
    <header>
       <h3>
    <label for="nav-toggle">
        <span class="las la-bars"></span>
    </label>
    Dashboard
       </h3>
<div class="search-wrapper">
    <span class="las la-search"></span>
    <input type="search" placeholder="Search here" />
</div>
<div class="user-wrapper">
    <img src="../image/Solar Tracker_20240513_142859_0000 (1).png" width="80px" height="80" alt="">
    <div>
  
    </div>
</div>
    </header>
    <main>
        <div class="dashboard-cards">
            <div class="card-single">
                <div>
                    <h1>54</h1>
                    <span>Customers</span>
                </div>
                <div>
                    <span class="las la-users"></span>
                </div>
            </div>
            <div class="card-single">
                <div>
                    <h1>79</h1>
                    <span>Projects</span>
                </div>
                <div>
                    <span class="las la-clipboard-list"></span>
                </div>
            </div>
            <div class="card-single">
                <div>
                    <h1>124</h1>
                    <span>Orders</span>
                </div>
                <div>
                    <span class="las la-shopping-bag"></span>
                </div>
            </div>
            <div class="card-single">
                <div>
                    <h1>$6k</h1>
                    <span>Income</span>
                </div>
                <div>
                    <span class="las la-google-wallet"></span>
                </div>
            </div>
        </div>
<?php

// Database connection details
$hostname = 'localhost:3306';
$username = 'solartracker_solartracker';
$password = 'LPyeKFPa%[+3';
$databasename = 'solartracker_ezonsolartracker';

// Connect to the database
$link = mysqli_connect($hostname, $username, $password, $databasename);

if (!$link) {
    die('Connection error: ' . mysqli_connect_error());
}

// SQL query
$query = "SELECT contact_id, first_name, email, phone, pdf_attachment FROM contact_user_data";

// Execute the query
$result = mysqli_query($link, $query);

if ($result) {
    $numrow = mysqli_num_rows($result);
    if ($numrow > 0) {
        echo '<table class="dbresult">';
        echo '<caption>Job Application</caption>';
        echo '<tr>';
        echo '<th>Contact_Id</th>';
        echo '<th>First_Name</th>';
        echo '<th>Email</th>';
        echo '<th>Phone</th>';
        echo '<th>Pdf_Attachment</th>';
        echo '</tr>';
        
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($row['contact_id']) . '</td>';
            echo '<td>' . htmlspecialchars($row['first_name']) . '</td>';
            echo '<td>' . htmlspecialchars($row['email']) . '</td>';
            echo '<td>' . htmlspecialchars($row['phone']) . '</td>';
            echo '<td>' . htmlspecialchars($row['pdf_attachment']) . '</td>';
            echo '</tr>';
        }
        
        echo '</table>';
    } else {
        echo 'Record not found';
    }
} else {
    echo 'Query error: ' . mysqli_error($link);
}



// Second SQL query
$query2 = "SELECT first_name, last_name, company_name, email, phone, additional_info FROM user_details";

// Execute the second query
$result2 = mysqli_query($link, $query2);

if ($result2) {
    $numrow2 = mysqli_num_rows($result2);
    if ($numrow2 > 0) {
        echo '<table class="dbresult">';
        echo '<caption>User Details</caption>'; // Title for second table
        echo '<tr>';
        echo '<th>First_Name</th>';
        echo '<th>Last_Name</th>';
        echo '<th>Company_Name</th>';
        echo '<th>Email</th>';
        echo '<th>Phone</th>';
        echo '<th>Additional_Info</th>';
        echo '</tr>';
        
        while ($row2 = mysqli_fetch_assoc($result2)) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($row2['first_name']) . '</td>';
            echo '<td>' . htmlspecialchars($row2['last_name']) . '</td>';
            echo '<td>' . htmlspecialchars($row2['company_name']) . '</td>';
            echo '<td>' . htmlspecialchars($row2['email']) . '</td>';
            echo '<td>' . htmlspecialchars($row2['phone']) . '</td>';
            echo '<td>' . htmlspecialchars($row2['additional_info']) . '</td>';
            echo '</tr>';
        }
        
        echo '</table>';
    } else {
        echo 'Record not found for Employee Details';
    }
} else {
    echo 'Query error for Employee Details: ' . mysqli_error($link);
}

// Close the database connection
mysqli_close($link);

?>


<style>
    .dbresult, .dbresult td,. dbresult th{
        border:1px solid black;
        border-collapse: collapse;
        padding: 8px;
    }
    .dbresult{
        margin: auto;
        width: 800px;
       margin-top: 10%;
    }
    .dbresult tr:nth-child(odd){
        background-color: #b2d0d6;
    }
    .dbresult tr:nth-child(even){
        background-color: lightcyan;
    }
    .dbresult caption{
        font-weight: bold;
        font-size: 30px;
        padding-bottom: 3%;
    }
    </style>

        
    </main>
</div>

</body>
</html>
<style>
:root{
    --main-color: #DD2F6E;
    --color-dark: #1D2231;
    --text-grey: #8390a2;
}
*{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    list-style-type: none;
    text-decoration: none;
    font-family: 'Poppins', sans-serif;
}
.sidebar{
    width: 345px;
    position: fixed;
    left: 0;
    top: 0;
    height: 100%;
    background: var(--main-color);
    z-index: 100;
    transition: width 300ms;
}
.sidebar-brand{
    height: 90px;
    padding: 1rem 0rem 1rem 2rem;
    color: #fff;
}
.sidebar-brand span{
    display: inline-block;
    padding-right: 1rem;
}
.sidebar-menu{
    margin-top: 1rem;
}
.sidebar-menu li{
    width: 100%;
    margin-bottom: 1.7rem;
    padding-left: 1rem;
}
.sidebar-menu a{
    padding-left: 1rem;
    display: block;
    color: #fff;
    font-size: 1.1rem;
}
.sidebar-menu a.active{
    background: #fff;
    padding-top: 1rem;
    padding-bottom: 1rem;
    color: var(--main-color);
    border-radius: 30px 0px 0px 30px;
}
.sidebar-menu a span:first-child{
    font-size: 1.5rem;
    padding-right: 1rem;
}
#nav-toggle:checked + .sidebar {
    width: 70px;
}
#nav-toggle:checked + .sidebar .sidebar-brand,
#nav-toggle:checked + .sidebar li{
    padding-left: 1rem;
    text-align: center;
}
#nav-toggle:checked + .sidebar li a {
    padding-left: 0rem;
}

#nav-toggle:checked + .sidebar .sidebar-brand h2 span:last-child,
#nav-toggle:checked + .sidebar li a span:last-child{
    display: none;
}
#nav-toggle:checked ~ .main-content {
    margin-left: 70px;
}
#nav-toggle:checked ~ .main-content header{
   width: calc(100% - 70px);
   left: 70px;
}
.main-content{
    transition: margin-left 300ms;
    margin-left: 345px;
}
header{
    background: #fff;
    display: flex;
    justify-content: space-between;
    padding: 1rem 1.5rem;
    box-shadow: 2px 2px 5px rgba(0,0,0,0.2); 
    position: fixed;
    left: 345px;
    width: calc(100% - 345px);
    top: 0;
    z-index: 100;
    transition: left 300ms;
}
#nav-toggle{
    display: none;
}
header h2{
    color: #222;
}
header label span{
    font-size: 1.7rem;
    padding-right: 1rem;
}
.search-wrapper{
    border: 1px solid #f0f0f0;
    border-radius: 30px;
    height: 50px;
    display: flex;
    align-items: center;
    overflow-x: hidden;
}
.search-wrapper span{
    display: inline-block;
    padding: 0rem 1rem;
    font-size: 1.5rem;
}
.search-wrapper input{
    height: 100%;
    padding: .5rem;
    border: none;
    outline: none;
}
.user-wrapper{
    display: flex;
    align-items: center;
}
.user-wrapper img{
    border-radius: 50%;
    margin-right: 1rem;
}
.user-wrapper h4{
    margin-bottom: 0rem !important;
}
.user-wrapper small{
    display: inline-block;
    color: var(--text-grey);
}
main{
    margin-top: 89px;
    padding: 2rem 1.5rem;
    background: #f1f5f9;
    min-height: calc(100vh - 90px);
}
.dashboard-cards {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    grid-gap: 2rem;
    margin-top: 1rem;
}
.card-single{
    display: flex;
    justify-content: space-between;
    background: #fff;
    padding: 2rem;
    border-radius: 2px;
}

.card-single div:last-child span {
    font-size: 3rem;
    color: var(--main-color);
}
.card-single div:first-child span{
    color: var(--text-grey);
}
.card-single:last-child{
    background: var(--main-color);
}
.card-single:last-child h1,
.card-single:last-child div:first-child span,
.card-single:last-child div:last-child span {
    color: #fff;
}
.recent-grid{
    margin-top: 3.5rem;
    display: grid;
    grid-gap: 2rem;
    grid-template-columns: 70% auto;
}
.card{
    background: #fff;
    border-radius: 5px;
}
.card-header,
.card-body{
    padding: 1rem;
}
.card-header{
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid #f0f0f0;
}
.card-header button{
    background: var(--main-color);
    border-radius: 10px;
    color: #fff;
    font-size: .8rem;
    padding: .5rem 1rem;
    border: 1px solid var(--main-color);

}
table{
    border-collapse: collapse;
}
thead tr{
    border: 1px solid #f0f0f0;
    border-bottom: 1px solid #f0f0f0;
}
thead td{
    font-weight: 700;
}
td{
    padding: .5rem 1rem;
}
.table-repsonsive{
    width: 100%;
    overflow-x: auto;
}

@media only screen and (max-width: 1200px){
    .sidebar {
        width: 70px;
    }
    .sidebar .sidebar-brand,
    .sidebar li{
        padding-left: 1rem;
        text-align: center;
    }
    .sidebar li a {
        padding-left: 0rem;
    }
    
    .sidebar .sidebar-brand h2 span:last-child,
    .sidebar li a span:last-child{
        display: none;
    }
    .main-content {
        margin-left: 70px;
    }
    .main-content header{
       width: calc(100% - 70px);
       left: 70px;
    }

}
@media only screen and (max-width: 960px){
    .cards{
        grid-template-columns: repeat(3, 1fr );
    }
    .recent-grid{
        grid-template-columns: 60% 40%;
    }
}
@media only screen and (max-width: 768px){
    .cards{
        grid-template-columns: repeat(2, 1fr );
    }
    .recent-grid{
        grid-template-columns: 100%;
    }
    .search-wrapper{
        display: none;
    }
}
@media only screen and (max-width: 768px){
    .cards{
        grid-template-columns: 100%;
    }
}
</style>






