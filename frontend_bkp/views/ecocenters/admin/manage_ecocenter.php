<?php
$view = 'ecocenteradmin'; // This is for determining which scripts and css are going to be loaded
include($_SERVER['DOCUMENT_ROOT']."/header.php");


$ec_id = $_GET['ec_id'];
$user_id = $_SESSION['user_id'];
//If the user is profile a true value is stored
$myec = people_is_admin($ec_id, $user_id);

$name = ec_get_name($ec_id);


include (_VIEWS_PATH_."members/sidebar_left.php");
?>

<?php include_once("admin_menu.php"); ?>
<content>
	<h1><?php echo $name ?>'s Admin</h1><button class="green backtoprofile" onclick="location.href='<?php echo _VIEWS_URL_ ?>ecocenters/profile.php?ec_id=<?php echo $ec_id ?>'">Back to Profile</button>
<?php if ($myec){ ?>

	<p>Here you will be able to setup the information necessary for your Ecocenter's modules</p>

	<div id="bookings">
		<h3>Rooms</h3>
		<a href="<?php echo _VIEWS_URL_ ?>ecocenters/admin/bookings/newroom.php?ec_id=<?php echo $ec_id ?>" class="iframe newroom fancylink">New Room</a>
				<a href="<?php echo _VIEWS_URL_ ?>ecocenters/admin/bookings/managerooms.php?ec_id=<?php echo $ec_id ?>" >Manage Rooms</a>
		<button class="requests">View Requests</button>
		<div id="overview">

		</div>
	</div>
	<div id="workshops">
		<h3>Workshops</h3>
			<a href="<?php echo _VIEWS_URL_ ?>ecocenters/admin/workshops/new_workshop.php?ec_id=<?php echo $ec_id ?>" class="iframe newroom fancylink">New Workshop</a>
			<a href="<?php echo _VIEWS_URL_ ?>ecocenters/admin/workshops/manage_workshops.php?ec_id=<?php echo $ec_id ?>" >Manage Workshops</a>
		<button>Notifications</button>
		<div id="overview">
		</div>
	</div>
	<div id="volunteerings">
		<h3>Volunteer Vacancies</h3>
		<a href="<?php echo _VIEWS_URL_ ?>ecocenters/admin/vacancies/new_vacancy.php?ec_id=<?php echo $ec_id ?>" class="iframe newroom fancylink">New Vacancy</a>
		<a href="<?php echo _VIEWS_URL_ ?>ecocenters/admin/vacancies/manage_vacancies.php?ec_id=<?php echo $ec_id ?>" >Manage Vacancies</a>
		<button>Notifications</button>
		<div id="overview">
		</div>
	</div>
	<div id="mycredits">
		<h3>Your account type</h3>
		<strong>Free</strong> account
		<button class="green">Upgrade</button>
		<div id="volunteerquota">
			<h3>Volunteer Quota</h3>
			<span class="number">0</span>Vacancies left
			<button class="green">Get More</button>
		</div>
		<div id="activerooms">
			<h3>Rooms</h3>
			<span class="number">10</span>Active Rooms
			<span class="number">120</span>This Month's Bookings
		</div>
		<div id="activeworkshops">
			<h3>Workshops</h3>
			<span class="number">10</span>Active Workshops
			<span class="number">10</span>Active Workshops
		</div>
		<div id="income">
			<h3>Income</h3>
			<span class="number">$1,743.00</span>All time Income
			<span class="number">$897.00</span>This Month's Income
			<span class="number">$290.00</span>Expected Month's Income

		</div>
	</div>
<?php }else{ ?>
		<h2>Not Authorized to view this page</h2>
<?php } ?>
</content>
