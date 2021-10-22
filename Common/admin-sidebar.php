  <div class="row w-100">
    <button class="show-btn button-show ml-auto">
      <i class="fa fa-bars py-1" aria-hidden="true"></i>
    </button> 
  </div>
    <nav id="sidebarMenu" class="">
			<div class="col-xl-2 col-lg-3 col-md-4 sidebar position-fixed border-right">
        <div class="sidebar-header">
          <div class="nav-item">
              <a class="nav-link text-white" href="../admin/admin-index.php">
                <span class="home"></span>
                  <i class="fa fa-home mr-2" aria-hidden="true"></i> --ADMIN-- 
              </a>
          </div>
        </div>   
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="../admin/Teacher.php">
              <span data-feather="file"></span>
              <i class="fa fa-user mr-2" aria-hidden="true"></i> Faculty Registration
            </a>
		      </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin/time-table-edit.php">
              <span data-feather="layers"></span>
               <i class="fa fa-clock-o mr-2" aria-hidden="true"></i> Faculty Schedule
            </a>
		  </li>
      <li class="nav-item">
            <a class="nav-link" href="../admin/teacher-salary.php">
              <span data-feather="layers"></span>
              <i class="fa fa-money mr-2" aria-hidden="true"></i> Faculty Salary
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin/teacher-attendance.php">
              <span data-feather="layers"></span>
              <i class="fa fa-check-square mr-2" aria-hidden="true"></i> Faculty Attendance
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin/Student.php">
              <span data-feather="shopping-cart"></span>
              <i class="fa fa-user-circle mr-2" aria-hidden="true"></i> Student Registration
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin/student-violation.php">
              <span data-feather="layers"></span>
              <i class="fa fa-warning mr-2" aria-hidden="true"></i> Student Violation
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin/student-attendance.php">
              <span data-feather="layers"></span>
              <i class="fa fa-check-square-o mr-2" aria-hidden="true"></i> Student Attendance
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin/student-fee.php">
              <span data-feather="layers"></span>
              <i class="fa fa-credit-card-alt mr-2" aria-hidden="true"></i> Student Payment
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin/Courses.php">
              <span data-feather="users"></span>
              <i class="fa fa-book mr-2" aria-hidden="true"></i> Courses
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin/subjects.php">
              <span data-feather="bar-chart-2"></span>
              <i class="fa fa-file-text-o mr-2" aria-hidden="true"></i> Subjects
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="../admin/class-result.php">
              <span data-feather="layers"></span>
              <i class="fa fa-users mr-2" aria-hidden="true"></i> Class Results
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin/announcement.php">
              <span data-feather="layers"></span>
              <i class="fas fa-bullhorn mr-2" aria-hidden="true"></i> Announcements
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin/manage-accounts.php">
              <span data-feather="layers"></span>
              <i class="fa fa-key mr-2" aria-hidden="true"></i> Manage Accounts
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <script>
        const toggleBtn = document.querySelector(".show-btn");
        const sidebar = document.querySelector(".sidebar");
        // undefined
        toggleBtn.addEventListener("click",function(){
            sidebar.classList.toggle("show-sidebar");
        });
    </script>