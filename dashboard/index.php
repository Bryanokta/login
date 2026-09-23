<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../auth/login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard</title>

    <link rel="stylesheet" href="../assets/css/style.css">

</head>

<body>

    <div class="dashboard">

        <aside class="sidebar">

            <div class="logo">
                Admin Panel
            </div>

            <nav>

                <a href="index.php" class="active">
                    <span>▣</span>
                    Dashboard
                </a>

            </nav>

            <a href="../auth/logout.php" class="logout">
                <span>↪</span>
                Logout
            </a>

        </aside>


        <main class="content">

            <header class="topbar">

                <div>

                    <h1>Dashboard</h1>
                </div>

                <div class="user-info">

                    <div class="user-avatar">
                        <?php echo strtoupper(substr($_SESSION['name'], 0, 1)); ?>
                    </div>

                    <div>
                        <strong>
                            <?php echo $_SESSION['name']; ?>
                        </strong>

                        <small>
                            Administrator
                        </small>
                    </div>

                </div>

            </header>


            <section class="welcome-card">

                <div>

                    <p class="welcome-label">
                        Welcome back
                    </p>

                    <h2>
                        Hello, <?php echo $_SESSION['name']; ?> 
                        
                    </h2>

                    

                </div>

            </section>


            <section class="dashboard-section">

                <div class="section-title">

                    <h2>
                        Login Information
                    </h2>

                </div>


                <div class="info-container">

                    <div class="info-card">

                        <div class="info-icon">
                            U
                        </div>

                        <div class="info-content">

                            <span>
                                Username
                            </span>

                            <strong>
                                <?php echo $_SESSION['username']; ?>
                            </strong>

                        </div>

                    </div>


                    <div class="info-card">

                        <div class="info-icon">
                            N
                        </div>

                        <div class="info-content">

                            <span>
                                Name
                            </span>

                            <strong>
                                <?php echo $_SESSION['name']; ?>
                            </strong>

                        </div>

                    </div>


                    <div class="info-card">

                        <div class="info-icon">
                            ✓
                        </div>

                        <div class="info-content">

                            <span>
                                Status
                            </span>

                            <strong class="status">
                                Active
                            </strong>

                        </div>

                    </div>

                </div>

            </section>

        </main>

    </div>

</body>

</html>