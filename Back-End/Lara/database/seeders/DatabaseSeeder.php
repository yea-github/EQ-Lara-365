<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        collect([
            ['first_name' => 'John', 'last_name' => 'Baptist', 'user_name' => 'john-123', 'roles' => 'User'],
            ['first_name' => 'Ada', 'last_name' => 'Lovelace', 'user_name' => 'ada-124', 'roles' => 'Super Admin'],
            ['first_name' => 'Alan', 'last_name' => 'Turing', 'user_name' => 'alan-125', 'roles' => 'Admin'],
            ['first_name' => 'Grace', 'last_name' => 'Hopper', 'user_name' => 'grace-126', 'roles' => 'User Modified'],
            ['first_name' => 'Katherine', 'last_name' => 'Johnson', 'user_name' => 'katherine-127', 'roles' => 'User'],
            ['first_name' => 'Dorothy', 'last_name' => 'Vaughan', 'user_name' => 'dorothy-128', 'roles' => 'Admin'],
            ['first_name' => 'Mary', 'last_name' => 'Jackson', 'user_name' => 'mary-129', 'roles' => 'User'],
            ['first_name' => 'Margaret', 'last_name' => 'Hamilton', 'user_name' => 'margaret-130', 'roles' => 'Super Admin'],
            ['first_name' => 'Hedy', 'last_name' => 'Lamarr', 'user_name' => 'hedy-131', 'roles' => 'User Modified'],
            ['first_name' => 'Radia', 'last_name' => 'Perlman', 'user_name' => 'radia-132', 'roles' => 'User'],
            ['first_name' => 'Barbara', 'last_name' => 'Liskov', 'user_name' => 'barbara-133', 'roles' => 'Admin'],
            ['first_name' => 'Frances', 'last_name' => 'Allen', 'user_name' => 'frances-134', 'roles' => 'User'],
            ['first_name' => 'Anita', 'last_name' => 'Borg', 'user_name' => 'anita-135', 'roles' => 'User Modified'],
            ['first_name' => 'Tim', 'last_name' => 'Berners', 'user_name' => 'tim-136', 'roles' => 'Super Admin'],
            ['first_name' => 'Linus', 'last_name' => 'Torvalds', 'user_name' => 'linus-137', 'roles' => 'Admin'],
            ['first_name' => 'Dennis', 'last_name' => 'Ritchie', 'user_name' => 'dennis-138', 'roles' => 'User'],
            ['first_name' => 'Ken', 'last_name' => 'Thompson', 'user_name' => 'ken-139', 'roles' => 'Admin'],
            ['first_name' => 'Donald', 'last_name' => 'Knuth', 'user_name' => 'donald-140', 'roles' => 'Super Admin'],
            ['first_name' => 'Edsger', 'last_name' => 'Dijkstra', 'user_name' => 'edsger-141', 'roles' => 'User Modified'],
            ['first_name' => 'Guido', 'last_name' => 'Rossum', 'user_name' => 'guido-142', 'roles' => 'User'],
            ['first_name' => 'James', 'last_name' => 'Gosling', 'user_name' => 'james-143', 'roles' => 'Admin'],
            ['first_name' => 'Brendan', 'last_name' => 'Eich', 'user_name' => 'brendan-144', 'roles' => 'User'],
            ['first_name' => 'Bjarne', 'last_name' => 'Stroustrup', 'user_name' => 'bjarne-145', 'roles' => 'User Modified'],
            ['first_name' => 'Martin', 'last_name' => 'Fowler', 'user_name' => 'martin-146', 'roles' => 'Admin'],
            ['first_name' => 'Kent', 'last_name' => 'Beck', 'user_name' => 'kent-147', 'roles' => 'User'],
            ['first_name' => 'Robert', 'last_name' => 'Martin', 'user_name' => 'robert-148', 'roles' => 'Super Admin'],
            ['first_name' => 'Sandi', 'last_name' => 'Metz', 'user_name' => 'sandi-149', 'roles' => 'User'],
            ['first_name' => 'Rebecca', 'last_name' => 'Wirfs', 'user_name' => 'rebecca-150', 'roles' => 'Admin'],
            ['first_name' => 'Erich', 'last_name' => 'Gamma', 'user_name' => 'erich-151', 'roles' => 'User Modified'],
            ['first_name' => 'Ward', 'last_name' => 'Cunningham', 'user_name' => 'ward-152', 'roles' => 'User'],
        ])->each(function (array $user): void {
            User::query()->updateOrCreate(
                ['user_name' => $user['user_name']],
                [
                    'first_name' => $user['first_name'],
                    'last_name' => $user['last_name'],
                    'roles' => $user['roles'],
                    'password' => Hash::make('123456'),
                ]
            );
        });

        collect([
            ['first_name' => 'Gillian', 'last_name' => 'Anderson', 'date_of_birth' => '1985-01-07', 'birth_place' => 'Frankfurt', 'salary_per_month' => 5000, 'start_date' => '2015-03-23', 'department' => 'Software Development', 'skills' => 'PHP, Angular, ReactJS, JavaScript, TypeScript', 'remark' => 'Working for Accounting Software'],
            ['first_name' => 'Marcus', 'last_name' => 'Weber', 'date_of_birth' => '1988-04-12', 'birth_place' => 'Berlin', 'salary_per_month' => 4800, 'start_date' => '2017-06-01', 'department' => 'Software Development', 'skills' => 'Laravel, Vue.js, MySQL, REST APIs', 'remark' => 'Backend API specialist'],
            ['first_name' => 'Sofia', 'last_name' => 'Klein', 'date_of_birth' => '1992-09-18', 'birth_place' => 'Munich', 'salary_per_month' => 4300, 'start_date' => '2019-02-15', 'department' => 'Quality Assurance', 'skills' => 'Manual Testing, Cypress, Selenium, TestRail', 'remark' => 'Leads regression testing'],
            ['first_name' => 'Daniel', 'last_name' => 'Fischer', 'date_of_birth' => '1984-11-03', 'birth_place' => 'Hamburg', 'salary_per_month' => 5600, 'start_date' => '2014-10-20', 'department' => 'Project Management', 'skills' => 'Agile, Scrum, Jira, Risk Management', 'remark' => 'Coordinates enterprise projects'],
            ['first_name' => 'Emma', 'last_name' => 'Schneider', 'date_of_birth' => '1990-07-27', 'birth_place' => 'Cologne', 'salary_per_month' => 3900, 'start_date' => '2020-01-06', 'department' => 'Human Resources', 'skills' => 'Recruiting, Onboarding, Employee Relations', 'remark' => 'Handles technical hiring'],
            ['first_name' => 'Jonas', 'last_name' => 'Meyer', 'date_of_birth' => '1993-02-21', 'birth_place' => 'Stuttgart', 'salary_per_month' => 4100, 'start_date' => '2021-04-12', 'department' => 'DevOps', 'skills' => 'Docker, GitHub Actions, Linux, Nginx', 'remark' => 'Maintains CI/CD pipelines'],
            ['first_name' => 'Laura', 'last_name' => 'Hoffmann', 'date_of_birth' => '1987-06-30', 'birth_place' => 'Dresden', 'salary_per_month' => 4550, 'start_date' => '2018-09-03', 'department' => 'Accounting', 'skills' => 'Payroll, Invoicing, DATEV, Excel', 'remark' => 'Monthly closing support'],
            ['first_name' => 'Noah', 'last_name' => 'Wagner', 'date_of_birth' => '1995-12-05', 'birth_place' => 'Leipzig', 'salary_per_month' => 3700, 'start_date' => '2022-07-01', 'department' => 'Customer Support', 'skills' => 'Zendesk, Troubleshooting, SQL Basics', 'remark' => 'First-line product support'],
            ['first_name' => 'Mia', 'last_name' => 'Becker', 'date_of_birth' => '1989-03-14', 'birth_place' => 'Bremen', 'salary_per_month' => 5200, 'start_date' => '2016-11-14', 'department' => 'Product Management', 'skills' => 'Roadmapping, User Stories, Analytics', 'remark' => 'Owns customer dashboard roadmap'],
            ['first_name' => 'Leon', 'last_name' => 'Schulz', 'date_of_birth' => '1991-08-09', 'birth_place' => 'Dortmund', 'salary_per_month' => 4450, 'start_date' => '2019-05-27', 'department' => 'UX Design', 'skills' => 'Figma, Prototyping, Accessibility, Research', 'remark' => 'Designs internal tools'],
            ['first_name' => 'Clara', 'last_name' => 'Koch', 'date_of_birth' => '1986-10-24', 'birth_place' => 'Essen', 'salary_per_month' => 6000, 'start_date' => '2013-08-19', 'department' => 'Engineering Management', 'skills' => 'Leadership, Architecture, Coaching', 'remark' => 'Manages platform team'],
            ['first_name' => 'Felix', 'last_name' => 'Richter', 'date_of_birth' => '1994-05-02', 'birth_place' => 'Hanover', 'salary_per_month' => 3950, 'start_date' => '2021-10-04', 'department' => 'Marketing', 'skills' => 'SEO, Content Strategy, Campaigns', 'remark' => 'Runs product launch campaigns'],
            ['first_name' => 'Hannah', 'last_name' => 'Wolf', 'date_of_birth' => '1990-01-16', 'birth_place' => 'Nuremberg', 'salary_per_month' => 4700, 'start_date' => '2017-03-06', 'department' => 'Sales', 'skills' => 'CRM, Negotiation, Account Planning', 'remark' => 'Key account manager'],
            ['first_name' => 'Elias', 'last_name' => 'Neumann', 'date_of_birth' => '1983-07-11', 'birth_place' => 'Bonn', 'salary_per_month' => 6300, 'start_date' => '2012-05-21', 'department' => 'Architecture', 'skills' => 'System Design, PHP, Microservices, Security', 'remark' => 'Reviews major technical decisions'],
            ['first_name' => 'Lina', 'last_name' => 'Schwarz', 'date_of_birth' => '1996-04-28', 'birth_place' => 'Mainz', 'salary_per_month' => 3600, 'start_date' => '2023-01-09', 'department' => 'Data Analytics', 'skills' => 'Power BI, SQL, Python, Reporting', 'remark' => 'Builds sales dashboards'],
            ['first_name' => 'David', 'last_name' => 'Zimmermann', 'date_of_birth' => '1989-09-06', 'birth_place' => 'Augsburg', 'salary_per_month' => 5050, 'start_date' => '2018-01-22', 'department' => 'Software Development', 'skills' => 'ReactJS, TypeScript, CSS, Jest', 'remark' => 'Frontend feature lead'],
            ['first_name' => 'Sarah', 'last_name' => 'Braun', 'date_of_birth' => '1991-12-19', 'birth_place' => 'Freiburg', 'salary_per_month' => 4200, 'start_date' => '2020-06-15', 'department' => 'Finance', 'skills' => 'Budgeting, Forecasting, Excel, Controlling', 'remark' => 'Supports yearly budget planning'],
            ['first_name' => 'Paul', 'last_name' => 'Kruger', 'date_of_birth' => '1987-02-08', 'birth_place' => 'Kiel', 'salary_per_month' => 4900, 'start_date' => '2016-04-04', 'department' => 'Security', 'skills' => 'OWASP, IAM, Audit, Incident Response', 'remark' => 'Security compliance contact'],
            ['first_name' => 'Nina', 'last_name' => 'Hartmann', 'date_of_birth' => '1993-06-25', 'birth_place' => 'Rostock', 'salary_per_month' => 3850, 'start_date' => '2022-02-01', 'department' => 'Customer Success', 'skills' => 'Training, Customer Health, CRM', 'remark' => 'Onboards new customers'],
            ['first_name' => 'Lukas', 'last_name' => 'Lange', 'date_of_birth' => '1985-11-29', 'birth_place' => 'Mannheim', 'salary_per_month' => 5400, 'start_date' => '2015-09-07', 'department' => 'Database Administration', 'skills' => 'MySQL, PostgreSQL, Backup, Query Tuning', 'remark' => 'Maintains production databases'],
            ['first_name' => 'Isabel', 'last_name' => 'Werner', 'date_of_birth' => '1992-03-03', 'birth_place' => 'Karlsruhe', 'salary_per_month' => 4150, 'start_date' => '2020-09-21', 'department' => 'Quality Assurance', 'skills' => 'API Testing, Postman, Automation, SQL', 'remark' => 'Tests integration releases'],
            ['first_name' => 'Tobias', 'last_name' => 'Schmitt', 'date_of_birth' => '1988-08-15', 'birth_place' => 'Wiesbaden', 'salary_per_month' => 4600, 'start_date' => '2017-12-11', 'department' => 'Operations', 'skills' => 'Process Improvement, Documentation, KPI Tracking', 'remark' => 'Improves support workflows'],
            ['first_name' => 'Amelie', 'last_name' => 'Krause', 'date_of_birth' => '1997-01-31', 'birth_place' => 'Saarbrucken', 'salary_per_month' => 3500, 'start_date' => '2023-05-02', 'department' => 'Marketing', 'skills' => 'Social Media, Copywriting, Analytics', 'remark' => 'Creates social campaign content'],
            ['first_name' => 'Max', 'last_name' => 'Lehmann', 'date_of_birth' => '1986-05-19', 'birth_place' => 'Potsdam', 'salary_per_month' => 5150, 'start_date' => '2016-02-29', 'department' => 'Software Development', 'skills' => 'PHP, Laravel, Redis, Queues', 'remark' => 'Optimizes backend performance'],
            ['first_name' => 'Katharina', 'last_name' => 'Huber', 'date_of_birth' => '1990-10-10', 'birth_place' => 'Regensburg', 'salary_per_month' => 4750, 'start_date' => '2018-07-16', 'department' => 'Legal', 'skills' => 'Contracts, GDPR, Compliance, Vendor Review', 'remark' => 'Reviews customer contracts'],
            ['first_name' => 'Ben', 'last_name' => 'Vogel', 'date_of_birth' => '1994-09-23', 'birth_place' => 'Ulm', 'salary_per_month' => 4000, 'start_date' => '2021-06-28', 'department' => 'IT Support', 'skills' => 'Windows, macOS, Networking, Asset Management', 'remark' => 'Handles office IT tickets'],
            ['first_name' => 'Lea', 'last_name' => 'Fuchs', 'date_of_birth' => '1989-12-02', 'birth_place' => 'Heidelberg', 'salary_per_month' => 5350, 'start_date' => '2014-12-01', 'department' => 'Product Management', 'skills' => 'Stakeholder Management, Discovery, Metrics', 'remark' => 'Owns billing features'],
            ['first_name' => 'Simon', 'last_name' => 'Berger', 'date_of_birth' => '1991-04-06', 'birth_place' => 'Magdeburg', 'salary_per_month' => 4550, 'start_date' => '2019-11-18', 'department' => 'DevOps', 'skills' => 'Kubernetes, Docker, Monitoring, Bash', 'remark' => 'Maintains staging environments'],
            ['first_name' => 'Marie', 'last_name' => 'Lorenz', 'date_of_birth' => '1984-06-17', 'birth_place' => 'Erfurt', 'salary_per_month' => 5800, 'start_date' => '2013-04-15', 'department' => 'Sales', 'skills' => 'Enterprise Sales, Forecasting, CRM', 'remark' => 'Handles enterprise accounts'],
            ['first_name' => 'Julian', 'last_name' => 'Bauer', 'date_of_birth' => '1995-03-20', 'birth_place' => 'Kassel', 'salary_per_month' => 3750, 'start_date' => '2022-09-12', 'department' => 'Customer Support', 'skills' => 'Product Support, Documentation, SQL Basics', 'remark' => 'Maintains help center articles'],
            ['first_name' => 'Theresa', 'last_name' => 'Seidel', 'date_of_birth' => '1987-09-13', 'birth_place' => 'Wuppertal', 'salary_per_month' => 4650, 'start_date' => '2016-06-13', 'department' => 'Accounting', 'skills' => 'Accounts Payable, Reporting, Excel', 'remark' => 'Vendor payment coordination'],
            ['first_name' => 'Niklas', 'last_name' => 'Arnold', 'date_of_birth' => '1992-11-08', 'birth_place' => 'Chemnitz', 'salary_per_month' => 4400, 'start_date' => '2020-03-30', 'department' => 'Data Analytics', 'skills' => 'SQL, Python, ETL, Dashboarding', 'remark' => 'Builds operational reports'],
            ['first_name' => 'Eva', 'last_name' => 'Peters', 'date_of_birth' => '1996-07-04', 'birth_place' => 'Lubeck', 'salary_per_month' => 3650, 'start_date' => '2023-08-14', 'department' => 'Human Resources', 'skills' => 'Interview Scheduling, HRIS, Onboarding', 'remark' => 'Supports employee lifecycle tasks'],
            ['first_name' => 'Moritz', 'last_name' => 'Keller', 'date_of_birth' => '1985-02-26', 'birth_place' => 'Oldenburg', 'salary_per_month' => 5500, 'start_date' => '2015-07-20', 'department' => 'Software Development', 'skills' => 'JavaScript, ReactJS, Node.js, Testing', 'remark' => 'Maintains customer portal'],
            ['first_name' => 'Jana', 'last_name' => 'Frank', 'date_of_birth' => '1990-05-12', 'birth_place' => 'Osnabruck', 'salary_per_month' => 4250, 'start_date' => '2018-10-08', 'department' => 'UX Design', 'skills' => 'UX Research, Wireframes, Design Systems', 'remark' => 'Maintains component guidelines'],
            ['first_name' => 'Philipp', 'last_name' => 'Albrecht', 'date_of_birth' => '1983-01-22', 'birth_place' => 'Trier', 'salary_per_month' => 6200, 'start_date' => '2012-02-06', 'department' => 'Engineering Management', 'skills' => 'Team Leadership, Delivery Planning, Mentoring', 'remark' => 'Leads backend team'],
            ['first_name' => 'Carolin', 'last_name' => 'Sommer', 'date_of_birth' => '1994-12-28', 'birth_place' => 'Halle', 'salary_per_month' => 3980, 'start_date' => '2021-01-18', 'department' => 'Customer Success', 'skills' => 'Customer Training, Renewals, Reporting', 'remark' => 'Supports renewal planning'],
            ['first_name' => 'Florian', 'last_name' => 'Graf', 'date_of_birth' => '1988-06-07', 'birth_place' => 'Cottbus', 'salary_per_month' => 4850, 'start_date' => '2017-08-07', 'department' => 'Security', 'skills' => 'Penetration Testing, Logging, Threat Modeling', 'remark' => 'Reviews application security'],
            ['first_name' => 'Melanie', 'last_name' => 'Dietrich', 'date_of_birth' => '1991-02-14', 'birth_place' => 'Jena', 'salary_per_month' => 4525, 'start_date' => '2019-03-25', 'department' => 'Finance', 'skills' => 'Controlling, Reporting, Forecasting', 'remark' => 'Prepares monthly finance reports'],
            ['first_name' => 'Alexander', 'last_name' => 'Brandt', 'date_of_birth' => '1986-08-01', 'birth_place' => 'Gera', 'salary_per_month' => 5050, 'start_date' => '2016-09-19', 'department' => 'Database Administration', 'skills' => 'MySQL, Replication, Monitoring, Backups', 'remark' => 'Improves database reliability'],
            ['first_name' => 'Elena', 'last_name' => 'Konig', 'date_of_birth' => '1993-10-05', 'birth_place' => 'Flensburg', 'salary_per_month' => 4100, 'start_date' => '2020-11-02', 'department' => 'Operations', 'skills' => 'Process Mapping, Training, Documentation', 'remark' => 'Standardizes internal procedures'],
            ['first_name' => 'Tim', 'last_name' => 'Engel', 'date_of_birth' => '1997-04-09', 'birth_place' => 'Passau', 'salary_per_month' => 3550, 'start_date' => '2023-02-20', 'department' => 'IT Support', 'skills' => 'Helpdesk, Hardware Setup, Networking Basics', 'remark' => 'Supports workstation setup'],
            ['first_name' => 'Viktoria', 'last_name' => 'Busch', 'date_of_birth' => '1989-07-22', 'birth_place' => 'Wurzburg', 'salary_per_month' => 5100, 'start_date' => '2015-11-09', 'department' => 'Legal', 'skills' => 'Privacy, Compliance, Contract Review', 'remark' => 'Maintains data protection records'],
            ['first_name' => 'Christian', 'last_name' => 'Otto', 'date_of_birth' => '1984-03-29', 'birth_place' => 'Ingolstadt', 'salary_per_month' => 5900, 'start_date' => '2013-06-24', 'department' => 'Architecture', 'skills' => 'Cloud Design, API Governance, Security', 'remark' => 'Defines integration standards'],
            ['first_name' => 'Franziska', 'last_name' => 'Jung', 'date_of_birth' => '1992-01-03', 'birth_place' => 'Paderborn', 'salary_per_month' => 4350, 'start_date' => '2020-05-04', 'department' => 'Quality Assurance', 'skills' => 'Automation, PHPUnit, Cypress, Bug Tracking', 'remark' => 'Automates acceptance tests'],
            ['first_name' => 'Robin', 'last_name' => 'Hahn', 'date_of_birth' => '1995-08-18', 'birth_place' => 'Reutlingen', 'salary_per_month' => 3825, 'start_date' => '2022-04-25', 'department' => 'Marketing', 'skills' => 'Email Marketing, Analytics, Copywriting', 'remark' => 'Manages newsletter campaigns'],
            ['first_name' => 'Alina', 'last_name' => 'Moller', 'date_of_birth' => '1987-12-11', 'birth_place' => 'Bremerhaven', 'salary_per_month' => 4725, 'start_date' => '2017-01-16', 'department' => 'Sales', 'skills' => 'Lead Qualification, CRM, Presentations', 'remark' => 'Runs product demos'],
            ['first_name' => 'Sebastian', 'last_name' => 'Voigt', 'date_of_birth' => '1990-09-30', 'birth_place' => 'Offenbach', 'salary_per_month' => 4950, 'start_date' => '2018-04-23', 'department' => 'Software Development', 'skills' => 'Laravel, Livewire, MySQL, PHPUnit', 'remark' => 'Maintains admin modules'],
            ['first_name' => 'Marlene', 'last_name' => 'Roth', 'date_of_birth' => '1994-06-16', 'birth_place' => 'Gottingen', 'salary_per_month' => 4050, 'start_date' => '2021-09-06', 'department' => 'Product Management', 'skills' => 'Backlog Management, Research, Analytics', 'remark' => 'Coordinates feature discovery'],
            ['first_name' => 'Oliver', 'last_name' => 'Simon', 'date_of_birth' => '1986-11-21', 'birth_place' => 'Darmstadt', 'salary_per_month' => 5250, 'start_date' => '2016-12-12', 'department' => 'DevOps', 'skills' => 'Terraform, Monitoring, Linux, Automation', 'remark' => 'Improves deployment automation'],
        ])->each(function (array $employee): void {
            Employee::query()->updateOrCreate(
                [
                    'first_name' => $employee['first_name'],
                    'last_name' => $employee['last_name'],
                ],
                [
                    'date_of_birth' => $employee['date_of_birth'],
                    'birth_place' => $employee['birth_place'],
                    'salary_per_month' => $employee['salary_per_month'],
                    'start_date' => $employee['start_date'],
                    'department' => $employee['department'],
                    'skills' => $employee['skills'],
                    'remark' => $employee['remark'],
                ]
            );
        });

        collect([
            ['customer_name' => 'Acme Corporation', 'sales' => 125000.50, 'orders' => 48],
            ['customer_name' => 'Globex GmbH', 'sales' => 98000.00, 'orders' => 34],
            ['customer_name' => 'Initech Solutions', 'sales' => 143500.75, 'orders' => 56],
            ['customer_name' => 'Umbrella Trading', 'sales' => 76000.25, 'orders' => 22],
            ['customer_name' => 'Stark Industries', 'sales' => 250000.00, 'orders' => 87],
            ['customer_name' => 'Wayne Enterprises', 'sales' => 211300.40, 'orders' => 73],
            ['customer_name' => 'Wonka Factory', 'sales' => 67500.00, 'orders' => 19],
            ['customer_name' => 'Soylent Retail', 'sales' => 89500.90, 'orders' => 31],
            ['customer_name' => 'Hooli Services', 'sales' => 178200.10, 'orders' => 64],
            ['customer_name' => 'Massive Dynamic', 'sales' => 132750.35, 'orders' => 42],
            ['customer_name' => 'Northstar Logistics', 'sales' => 154200.80, 'orders' => 51],
            ['customer_name' => 'Bluebird Media', 'sales' => 63450.25, 'orders' => 17],
            ['customer_name' => 'Silverline Consulting', 'sales' => 117900.00, 'orders' => 39],
            ['customer_name' => 'Pioneer Systems', 'sales' => 204300.60, 'orders' => 68],
            ['customer_name' => 'Summit Healthcare', 'sales' => 188750.45, 'orders' => 59],
            ['customer_name' => 'Greenfield Foods', 'sales' => 72500.10, 'orders' => 24],
            ['customer_name' => 'Atlas Manufacturing', 'sales' => 231400.00, 'orders' => 81],
            ['customer_name' => 'BrightPath Education', 'sales' => 59250.75, 'orders' => 16],
            ['customer_name' => 'Nova Retail Group', 'sales' => 167840.30, 'orders' => 53],
            ['customer_name' => 'Vertex Automotive', 'sales' => 219900.90, 'orders' => 76],
            ['customer_name' => 'Riverstone Finance', 'sales' => 196500.00, 'orders' => 62],
            ['customer_name' => 'Clearwater Energy', 'sales' => 148320.55, 'orders' => 45],
            ['customer_name' => 'Oakridge Properties', 'sales' => 134780.20, 'orders' => 37],
            ['customer_name' => 'MetroLink Transport', 'sales' => 101250.00, 'orders' => 29],
            ['customer_name' => 'Quantum Labs', 'sales' => 260400.75, 'orders' => 91],
            ['customer_name' => 'Evergreen Textiles', 'sales' => 84600.40, 'orders' => 27],
            ['customer_name' => 'Crescent Hotels', 'sales' => 112390.35, 'orders' => 33],
            ['customer_name' => 'Fusion Telecom', 'sales' => 242800.00, 'orders' => 84],
            ['customer_name' => 'Harbor Importers', 'sales' => 157650.15, 'orders' => 49],
            ['customer_name' => 'Orbit Software', 'sales' => 199999.99, 'orders' => 67],
            ['customer_name' => 'Keystone Builders', 'sales' => 120450.60, 'orders' => 36],
            ['customer_name' => 'Zenith Insurance', 'sales' => 176300.45, 'orders' => 58],
            ['customer_name' => 'Redwood Publishers', 'sales' => 68750.00, 'orders' => 21],
            ['customer_name' => 'Lighthouse Pharma', 'sales' => 286900.25, 'orders' => 95],
            ['customer_name' => 'Ironclad Security', 'sales' => 93780.80, 'orders' => 28],
            ['customer_name' => 'Sunrise Catering', 'sales' => 54890.50, 'orders' => 15],
            ['customer_name' => 'Meridian Aerospace', 'sales' => 312500.00, 'orders' => 104],
            ['customer_name' => 'Apex Sportswear', 'sales' => 108640.70, 'orders' => 32],
            ['customer_name' => 'Cobalt Electronics', 'sales' => 225750.35, 'orders' => 79],
            ['customer_name' => 'Willow Garden Supplies', 'sales' => 46320.10, 'orders' => 14],
            ['customer_name' => 'Phoenix Travel', 'sales' => 97540.90, 'orders' => 30],
            ['customer_name' => 'Sterling Legal Group', 'sales' => 141250.00, 'orders' => 41],
            ['customer_name' => 'Beacon Nonprofit', 'sales' => 38900.25, 'orders' => 12],
            ['customer_name' => 'Skyline Events', 'sales' => 75500.60, 'orders' => 23],
            ['customer_name' => 'CoreTech Solutions', 'sales' => 268400.15, 'orders' => 89],
            ['customer_name' => 'Golden Gate Imports', 'sales' => 129870.45, 'orders' => 40],
            ['customer_name' => 'Unity Clinics', 'sales' => 153990.00, 'orders' => 46],
            ['customer_name' => 'Polar Beverage Co', 'sales' => 88420.75, 'orders' => 26],
            ['customer_name' => 'NextWave Analytics', 'sales' => 184600.30, 'orders' => 61],
            ['customer_name' => 'Prime Office Supplies', 'sales' => 70450.20, 'orders' => 20],
        ])->each(function (array $customer): void {
            Customer::query()->updateOrCreate(
                ['customer_name' => $customer['customer_name']],
                [
                    'sales' => $customer['sales'],
                    'orders' => $customer['orders'],
                ]
            );
        });

        $months = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December',
        ];
        $shortMonths = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

        foreach (range(2020, 2026) as $year) {
            foreach ($months as $index => $month) {
                if ($year === 2026 && $index > 5) {
                    break;
                }

                $periodNumber = (($year - 2020) * 12) + $index + 1;

                DB::table('Daily_Summery')->updateOrInsert(
                    [
                        'year' => $year,
                        'month' => $month,
                    ],
                    [
                        'total_revenue' => 18000000 + ($periodNumber * 575000) + (($index + 1) * 32500),
                        'total_sales_orders' => 850 + ($periodNumber * 18) + (($index + 1) * 7),
                        'total_purchase_orders' => 420 + ($periodNumber * 9) + (($index + 1) * 4),
                        'total_inventory_value' => 7200000 + ($periodNumber * 215000) + (($index + 1) * 18500),
                        'total_outstanding' => 3100000 + ($periodNumber * 96500) + (($index + 1) * 12500),
                    ]
                );
            }
        }

        $crmCardMetrics = [
            'total_leads' => [
                'title' => 'Total Leads',
                'base_value' => 322,
                'step' => 12.14,
                'seasonal' => 18,
                'change' => 18.5,
                'target' => 1256,
            ],
            'qualified_leads' => [
                'title' => 'Qualified Leads',
                'base_value' => 112,
                'step' => 4.08,
                'seasonal' => 7,
                'change' => 12.4,
                'target' => 423,
            ],
            'opportunities' => [
                'title' => 'Opportunities',
                'base_value' => 31,
                'step' => 1.12,
                'seasonal' => 3,
                'change' => 9.7,
                'target' => 109,
            ],
            'won_deals' => [
                'title' => 'Won Deals',
                'base_value' => 18,
                'step' => 0.91,
                'seasonal' => 4,
                'change' => 21.3,
                'target' => 89,
            ],
            'conversion_rate' => [
                'title' => 'Conversion Rate',
                'base_value' => 12.3,
                'step' => 0.12,
                'seasonal' => 0.45,
                'change' => 4.6,
                'target' => 23.8,
            ],
        ];

        foreach (range(2020, 2026) as $year) {
            foreach ($months as $index => $month) {
                if ($year === 2026 && $index > 5) {
                    break;
                }

                $periodNumber = (($year - 2020) * 12) + $index + 1;

                foreach ($crmCardMetrics as $metricKey => $metric) {
                    $value = $metric['base_value']
                        + ($periodNumber * $metric['step'])
                        + ((($index + 1) % 4) * $metric['seasonal']);
                    $changePercent = max(1.2, $metric['change'] - ((78 - $periodNumber) * 0.08) + (($index % 3) * 0.2));

                    if ($year === 2026 && $month === 'June') {
                        $value = $metric['target'];
                        $changePercent = $metric['change'];
                    }

                    DB::table('CRM_Summary_Cards')->updateOrInsert(
                        [
                            'metric_key' => $metricKey,
                            'year' => $year,
                            'month' => $month,
                        ],
                        [
                            'title' => $metric['title'],
                            'value' => round($value, $metricKey === 'conversion_rate' ? 1 : 0),
                            'change_percent' => round($changePercent, 1),
                        ]
                    );
                }
            }
        }

        $salesRows = collect([
            ['year' => 2020, 'month' => 'January', 'category_name' => 'Electronics', 'sales_by_percentage' => 38, 'total_sales_price' => 5678345],
            ['year' => 2020, 'month' => 'January', 'category_name' => 'Machinery', 'sales_by_percentage' => 24, 'total_sales_price' => 2678345],
            ['year' => 2020, 'month' => 'January', 'category_name' => 'Furniture', 'sales_by_percentage' => 12, 'total_sales_price' => 1678345],
            ['year' => 2020, 'month' => 'January', 'category_name' => 'Consumer Goods', 'sales_by_percentage' => 11, 'total_sales_price' => 278345],
            ['year' => 2020, 'month' => 'January', 'category_name' => 'Others', 'sales_by_percentage' => 5, 'total_sales_price' => 78345],
        ]);

        $salesCategories = [
            ['category_name' => 'Electronics', 'base_percentage' => 38, 'base_sales_price' => 5678345],
            ['category_name' => 'Machinery', 'base_percentage' => 24, 'base_sales_price' => 2678345],
            ['category_name' => 'Furniture', 'base_percentage' => 12, 'base_sales_price' => 1678345],
            ['category_name' => 'Consumer Goods', 'base_percentage' => 11, 'base_sales_price' => 278345],
            ['category_name' => 'Others', 'base_percentage' => 5, 'base_sales_price' => 78345],
        ];

        foreach (range(2020, 2026) as $year) {
            foreach ($months as $index => $month) {
                if ($year === 2020 && $index === 0) {
                    continue;
                }

                if ($year === 2026 && $index > 5) {
                    break;
                }

                $periodNumber = (($year - 2020) * 12) + $index + 1;

                foreach ($salesCategories as $categoryIndex => $category) {
                    $salesRows->push([
                        'year' => $year,
                        'month' => $month,
                        'category_name' => $category['category_name'],
                        'sales_by_percentage' => max(1, $category['base_percentage'] + (($periodNumber + $categoryIndex) % 5) - 2),
                        'total_sales_price' => $category['base_sales_price'] + ($periodNumber * (92500 + ($categoryIndex * 18500))) + (($index + 1) * (4750 + ($categoryIndex * 1200))),
                    ]);
                }
            }
        }

        $salesRows->each(function (array $sale): void {
            DB::table('Sales')->updateOrInsert(
                [
                    'year' => $sale['year'],
                    'month' => $sale['month'],
                    'category_name' => $sale['category_name'],
                ],
                [
                    'sales_by_percentage' => $sale['sales_by_percentage'],
                    'total_sales_price' => $sale['total_sales_price'],
                ]
            );
        });

        $salesMonthAmounts = [2.0, 4.0, 5.6, 7.3, 6.5, 8.0, 8.3, 10.6, 8.8, 7.3, 9.4, 10.6];
        $salesTopProducts = [
            ['product' => 'Product A', 'sales' => 1245, 'revenue' => 24580000],
            ['product' => 'Product B', 'sales' => 986, 'revenue' => 19520000],
            ['product' => 'Product C', 'sales' => 745, 'revenue' => 14870000],
            ['product' => 'Product D', 'sales' => 631, 'revenue' => 10560000],
            ['product' => 'Product E', 'sales' => 432, 'revenue' => 7890000],
            ['product' => 'Product F', 'sales' => 385, 'revenue' => 6420000],
            ['product' => 'Product G', 'sales' => 301, 'revenue' => 5110000],
        ];
        $salesRecentOrders = [
            ['order_no' => 'SO-2026-1054', 'customer' => 'Alpha Enterprises', 'day' => 24, 'amount' => 52400, 'status' => 'Delivered'],
            ['order_no' => 'SO-2026-1053', 'customer' => 'Beta Industries', 'day' => 24, 'amount' => 37870, 'status' => 'Shipped'],
            ['order_no' => 'SO-2026-1052', 'customer' => 'Gamma Solutions', 'day' => 23, 'amount' => 44300, 'status' => 'Processing'],
            ['order_no' => 'SO-2026-1051', 'customer' => 'Delta Traders', 'day' => 23, 'amount' => 28600, 'status' => 'Delivered'],
            ['order_no' => 'SO-2026-1050', 'customer' => 'Epsilon Corporation', 'day' => 22, 'amount' => 31450, 'status' => 'Confirmed'],
            ['order_no' => 'SO-2026-1049', 'customer' => 'Zeta Wholesale', 'day' => 21, 'amount' => 26720, 'status' => 'Shipped'],
            ['order_no' => 'SO-2026-1048', 'customer' => 'Orion Retail', 'day' => 20, 'amount' => 41760, 'status' => 'Processing'],
        ];
        $salesTopCustomers = [
            ['customer' => 'Alpha Enterprises', 'orders' => 125, 'total_sales' => 24110000, 'outstanding' => 24500],
            ['customer' => 'Beta Industries', 'orders' => 98, 'total_sales' => 17130000, 'outstanding' => 18700],
            ['customer' => 'Gamma Solutions', 'orders' => 86, 'total_sales' => 15310000, 'outstanding' => 12400],
            ['customer' => 'Delta Traders', 'orders' => 71, 'total_sales' => 9840000, 'outstanding' => 9800],
            ['customer' => 'Epsilon Corporation', 'orders' => 65, 'total_sales' => 7880000, 'outstanding' => 7300],
            ['customer' => 'Zeta Wholesale', 'orders' => 58, 'total_sales' => 7160000, 'outstanding' => 6900],
            ['customer' => 'Orion Retail', 'orders' => 52, 'total_sales' => 6420000, 'outstanding' => 5300],
        ];

        foreach (range(2020, 2026) as $year) {
            foreach ($months as $index => $month) {
                if ($year === 2026 && $index > 5) {
                    break;
                }

                $periodNumber = (($year - 2020) * 12) + $index + 1;
                $isReferencePeriod = $year === 2026 && $month === 'June';

                DB::table('Sales_Dashboard_Summary')->updateOrInsert(
                    ['year' => $year, 'month' => $month],
                    [
                        'total_sales' => $isReferencePeriod ? 124580000 : 36000000 + ($periodNumber * 1120000) + (($index + 1) * 880000),
                        'total_orders' => $isReferencePeriod ? 2271 : 680 + ($periodNumber * 18) + (($index + 1) * 7),
                        'average_order_value' => $isReferencePeriod ? 54890 : 42000 + ($periodNumber * 125) + (($index + 1) * 185),
                        'conversion_rate' => $isReferencePeriod ? 18.6 : round(8.4 + ($periodNumber * 0.11) + (($index % 4) * 0.4), 1),
                        'return_rate' => $isReferencePeriod ? 2.3 : round(max(1.2, 4.8 - ($periodNumber * 0.03) + (($index % 3) * 0.18)), 1),
                        'total_sales_change' => $isReferencePeriod ? 14.7 : round(5.5 + (($periodNumber + $index) % 12) * 0.8, 1),
                        'total_orders_change' => $isReferencePeriod ? 11.1 : round(4.2 + (($periodNumber + 2) % 10) * 0.7, 1),
                        'average_order_value_change' => $isReferencePeriod ? 6.5 : round(2.5 + (($periodNumber + 3) % 8) * 0.55, 1),
                        'conversion_rate_change' => $isReferencePeriod ? 3.1 : round(1.4 + (($periodNumber + 1) % 6) * 0.35, 1),
                        'return_rate_change' => $isReferencePeriod ? -0.6 : round(-1.1 + (($periodNumber + 2) % 5) * 0.2, 1),
                    ]
                );

                foreach ($shortMonths as $monthIndex => $salesMonth) {
                    $amount = $isReferencePeriod
                        ? $salesMonthAmounts[$monthIndex]
                        : round(max(1.2, $salesMonthAmounts[$monthIndex] * (0.52 + ($periodNumber / 145))), 2);

                    DB::table('Sales_Over_Time')->updateOrInsert(
                        ['year' => $year, 'month' => $month, 'sales_month' => $salesMonth],
                        ['sales_amount' => $amount]
                    );
                }

                foreach ($salesTopProducts as $productIndex => $product) {
                    DB::table('Sales_Top_Products')->updateOrInsert(
                        ['year' => $year, 'month' => $month, 'product' => $product['product']],
                        [
                            'sales' => $isReferencePeriod ? $product['sales'] : max(80, $product['sales'] - ((78 - $periodNumber) * (9 + $productIndex))),
                            'revenue' => $isReferencePeriod ? $product['revenue'] : max(1200000, $product['revenue'] - ((78 - $periodNumber) * (210000 + ($productIndex * 16000)))),
                        ]
                    );
                }

                foreach ($salesRecentOrders as $orderIndex => $order) {
                    DB::table('Sales_Recent_Orders')->updateOrInsert(
                        ['year' => $year, 'month' => $month, 'order_no' => $isReferencePeriod ? $order['order_no'] : sprintf('SO-%04d-%04d', $year, 1000 + $periodNumber + $orderIndex)],
                        [
                            'customer' => $order['customer'],
                            'order_date' => sprintf('%04d-%02d-%02d', $year, $index + 1, min($order['day'], 28)),
                            'amount' => $isReferencePeriod ? $order['amount'] : max(8000, $order['amount'] - ((78 - $periodNumber) * (330 + ($orderIndex * 20)))),
                            'status' => $order['status'],
                        ]
                    );
                }

                foreach ($salesTopCustomers as $customerIndex => $customer) {
                    DB::table('Sales_Top_Customers')->updateOrInsert(
                        ['year' => $year, 'month' => $month, 'customer' => $customer['customer']],
                        [
                            'orders' => $isReferencePeriod ? $customer['orders'] : max(12, $customer['orders'] - ((78 - $periodNumber) * (1 + ($customerIndex % 2)))),
                            'total_sales' => $isReferencePeriod ? $customer['total_sales'] : max(900000, $customer['total_sales'] - ((78 - $periodNumber) * (175000 + ($customerIndex * 14000)))),
                            'outstanding' => $isReferencePeriod ? $customer['outstanding'] : max(1200, $customer['outstanding'] - ((78 - $periodNumber) * (80 + ($customerIndex * 5)))),
                        ]
                    );
                }
            }
        }

        $inventoryRows = collect([
            ['year' => 2020, 'month' => 'January', 'item_categorie' => 'Electronics', 'items' => 120, 'qty_in_hand' => 15250, 'value' => 6240000],
            ['year' => 2020, 'month' => 'January', 'item_categorie' => 'Machinery', 'items' => 86, 'qty_in_hand' => 8730, 'value' => 4560000],
            ['year' => 2020, 'month' => 'January', 'item_categorie' => 'Furniture', 'items' => 63, 'qty_in_hand' => 5730, 'value' => 2350000],
            ['year' => 2020, 'month' => 'January', 'item_categorie' => 'Raw Materials', 'items' => 150, 'qty_in_hand' => 22130, 'value' => 2460670],
            ['year' => 2020, 'month' => 'January', 'item_categorie' => 'Others', 'items' => 70, 'qty_in_hand' => 6330, 'value' => 9560067],
        ]);

        $inventoryCategories = [
            ['item_categorie' => 'Electronics', 'base_items' => 120, 'base_qty_in_hand' => 15250, 'base_value' => 6240000],
            ['item_categorie' => 'Machinery', 'base_items' => 86, 'base_qty_in_hand' => 8730, 'base_value' => 4560000],
            ['item_categorie' => 'Furniture', 'base_items' => 63, 'base_qty_in_hand' => 5730, 'base_value' => 2350000],
            ['item_categorie' => 'Raw Materials', 'base_items' => 150, 'base_qty_in_hand' => 22130, 'base_value' => 2460670],
            ['item_categorie' => 'Others', 'base_items' => 70, 'base_qty_in_hand' => 6330, 'base_value' => 9560067],
        ];

        foreach (range(2020, 2026) as $year) {
            foreach ($months as $index => $month) {
                if ($year === 2020 && $index === 0) {
                    continue;
                }

                if ($year === 2026 && $index > 4) {
                    break;
                }

                $periodNumber = (($year - 2020) * 12) + $index + 1;

                foreach ($inventoryCategories as $categoryIndex => $category) {
                    $inventoryRows->push([
                        'year' => $year,
                        'month' => $month,
                        'item_categorie' => $category['item_categorie'],
                        'items' => $category['base_items'] + (($periodNumber + $categoryIndex) % 8),
                        'qty_in_hand' => $category['base_qty_in_hand'] + ($periodNumber * (145 + ($categoryIndex * 35))) + (($index + 1) * (18 + ($categoryIndex * 4))),
                        'value' => $category['base_value'] + ($periodNumber * (87500 + ($categoryIndex * 22500))) + (($index + 1) * (6800 + ($categoryIndex * 1450))),
                    ]);
                }
            }
        }

        $inventoryRows->each(function (array $inventory): void {
            DB::table('Inventory_Summery')->updateOrInsert(
                [
                    'year' => $inventory['year'],
                    'month' => $inventory['month'],
                    'item_categorie' => $inventory['item_categorie'],
                ],
                [
                    'items' => $inventory['items'],
                    'qty_in_hand' => $inventory['qty_in_hand'],
                    'value' => $inventory['value'],
                ]
            );
        });

        $projectOverviewRows = collect([
            ['year' => 2020, 'month' => 'January', 'in_progress' => 8, 'completed' => 6, 'on_hold' => 3, 'not_started' => 11],
        ]);

        foreach (range(2020, 2026) as $year) {
            foreach ($months as $index => $month) {
                if ($year === 2020 && $index === 0) {
                    continue;
                }

                if ($year === 2026 && $index > 4) {
                    break;
                }

                $periodNumber = (($year - 2020) * 12) + $index + 1;

                $projectOverviewRows->push([
                    'year' => $year,
                    'month' => $month,
                    'in_progress' => 8 + ($periodNumber % 7),
                    'completed' => 6 + (int) floor($periodNumber / 2) + ($index % 4),
                    'on_hold' => 2 + (($periodNumber + $index) % 5),
                    'not_started' => max(1, 11 + (($index + 2) % 6) - (int) floor($periodNumber / 10)),
                ]);
            }
        }

        $projectOverviewRows->each(function (array $projectOverview): void {
            DB::table('Project_Overview')->updateOrInsert(
                [
                    'year' => $projectOverview['year'],
                    'month' => $projectOverview['month'],
                ],
                [
                    'in_progress' => $projectOverview['in_progress'],
                    'completed' => $projectOverview['completed'],
                    'on_hold' => $projectOverview['on_hold'],
                    'not_started' => $projectOverview['not_started'],
                ]
            );
        });

        $hrOverviewRows = collect([
            ['year' => 2020, 'month' => 'January', 'total_employees' => 356, 'new_joines' => 22, 'on_leave' => 18, 'open_positions' => 12],
        ]);

        foreach (range(2020, 2026) as $year) {
            foreach ($months as $index => $month) {
                if ($year === 2020 && $index === 0) {
                    continue;
                }

                if ($year === 2026 && $index > 4) {
                    break;
                }

                $periodNumber = (($year - 2020) * 12) + $index + 1;

                $hrOverviewRows->push([
                    'year' => $year,
                    'month' => $month,
                    'total_employees' => 356 + ($periodNumber * 3) + (int) floor($periodNumber / 4),
                    'new_joines' => 18 + (($periodNumber + $index) % 12),
                    'on_leave' => 12 + (($periodNumber + ($index * 2)) % 10),
                    'open_positions' => max(1, 12 + (($index + 3) % 8) - (int) floor($periodNumber / 14)),
                ]);
            }
        }

        $hrOverviewRows->each(function (array $hrOverview): void {
            DB::table('HR_Overview')->updateOrInsert(
                [
                    'year' => $hrOverview['year'],
                    'month' => $hrOverview['month'],
                ],
                [
                    'total_employees' => $hrOverview['total_employees'],
                    'new_joines' => $hrOverview['new_joines'],
                    'on_leave' => $hrOverview['on_leave'],
                    'open_positions' => $hrOverview['open_positions'],
                ]
            );
        });

        foreach (range(2020, 2026) as $year) {
            foreach ($months as $index => $month) {
                if ($year === 2026 && $index > 4) {
                    break;
                }

                $periodNumber = (($year - 2020) * 12) + $index + 1;
                $revenue = round(1 + (($periodNumber * 0.47) + (($index + 1) * 0.31)) % 9, 2);
                $expenses = round(max(1, min(10, $revenue - 0.5 - (($periodNumber + $index) % 4 * 0.18))), 2);

                DB::table('Revenue_Overview')->updateOrInsert(
                    [
                        'Year' => $year,
                        'Month' => $month,
                    ],
                    [
                        'Revenue' => $revenue,
                        'Expenses' => $expenses,
                    ]
                );
            }
        }

        $sourceRows = [
            ['source' => 'Website', 'percentage' => 40],
            ['source' => 'Referral', 'percentage' => 25],
            ['source' => 'Social Media', 'percentage' => 15],
            ['source' => 'Email', 'percentage' => 10],
            ['source' => 'Others', 'percentage' => 10],
        ];
        $pipelineRows = [
            ['stage' => 'New Leads', 'value' => 1256],
            ['stage' => 'Contacted', 'value' => 845],
            ['stage' => 'Qualified', 'value' => 423],
            ['stage' => 'Proposal', 'value' => 198],
            ['stage' => 'Won', 'value' => 89],
        ];
        $recentLeadTemplates = [
            ['name' => 'John Doe', 'company' => 'Alpha Ltd', 'source' => 'Website', 'status' => 'New', 'day' => 24],
            ['name' => 'Jane Smith', 'company' => 'Beta Corp', 'source' => 'Referral', 'status' => 'Contacted', 'day' => 24],
            ['name' => 'Michael Brown', 'company' => 'Gamma Inc', 'source' => 'Social Media', 'status' => 'Qualified', 'day' => 23],
            ['name' => 'Emily Davis', 'company' => 'Delta Co', 'source' => 'Email', 'status' => 'New', 'day' => 23],
            ['name' => 'David Wilson', 'company' => 'Epsilon Ltd', 'source' => 'Website', 'status' => 'Contacted', 'day' => 22],
            ['name' => 'Olivia Martin', 'company' => 'Zeta Group', 'source' => 'Referral', 'status' => 'Qualified', 'day' => 21],
            ['name' => 'Noah Taylor', 'company' => 'Orion AG', 'source' => 'Website', 'status' => 'New', 'day' => 20],
        ];
        $opportunityTemplates = [
            ['opportunity' => 'ERP Implementation', 'company' => 'Alpha Ltd', 'value' => 45000, 'stage' => 'Proposal', 'day' => 15],
            ['opportunity' => 'CRM Integration', 'company' => 'Beta Corp', 'value' => 32000, 'stage' => 'Negotiation', 'day' => 20],
            ['opportunity' => 'Cloud Migration', 'company' => 'Gamma Inc', 'value' => 28000, 'stage' => 'Qualification', 'day' => 10],
            ['opportunity' => 'Website Redesign', 'company' => 'Delta Co', 'value' => 18000, 'stage' => 'Proposal', 'day' => 5],
            ['opportunity' => 'Mobile App Development', 'company' => 'Epsilon Ltd', 'value' => 25000, 'stage' => 'Negotiation', 'day' => 18],
            ['opportunity' => 'Support Automation', 'company' => 'Zeta Group', 'value' => 22000, 'stage' => 'Qualification', 'day' => 25],
            ['opportunity' => 'Analytics Rollout', 'company' => 'Orion AG', 'value' => 36000, 'stage' => 'Proposal', 'day' => 28],
        ];

        foreach (range(2020, 2026) as $year) {
            foreach ($months as $index => $month) {
                if ($year === 2026 && $index > 5) {
                    break;
                }

                $periodNumber = (($year - 2020) * 12) + $index + 1;
                $referenceLeads = [100, 180, 215, 255, 345, 255, 238, 232, 230, 275, 350, 435];

                foreach ($shortMonths as $leadMonthIndex => $leadMonth) {
                    $leads = $year === 2026 && $month === 'June'
                        ? $referenceLeads[$leadMonthIndex]
                        : max(40, 80 + ($periodNumber * 5) + (($leadMonthIndex + 1) * 18) + (($leadMonthIndex % 4) * 12));

                    DB::table('CRM_Leads_Over_Time')->updateOrInsert(
                        ['year' => $year, 'month' => $month, 'lead_month' => $leadMonth],
                        ['leads' => $leads]
                    );
                }

                foreach ($sourceRows as $sourceIndex => $source) {
                    DB::table('CRM_Leads_By_Source')->updateOrInsert(
                        ['year' => $year, 'month' => $month, 'source' => $source['source']],
                        ['percentage' => max(3, $source['percentage'] + (($year === 2026 && $month === 'June') ? 0 : (($periodNumber + $sourceIndex) % 3) - 1))]
                    );
                }

                foreach ($pipelineRows as $pipelineIndex => $pipeline) {
                    $value = $year === 2026 && $month === 'June'
                        ? $pipeline['value']
                        : max(12, (int) round($pipeline['value'] * (0.42 + ($periodNumber / 140))));

                    DB::table('CRM_Pipeline_Overview')->updateOrInsert(
                        ['year' => $year, 'month' => $month, 'stage' => $pipeline['stage']],
                        ['value' => $value, 'sort_order' => $pipelineIndex + 1]
                    );
                }

                foreach ($recentLeadTemplates as $leadIndex => $lead) {
                    $leadDate = sprintf('%04d-%02d-%02d', $year, $index + 1, min($lead['day'], 28));

                    DB::table('CRM_Recent_Leads')->updateOrInsert(
                        ['year' => $year, 'month' => $month, 'name' => $lead['name'], 'company' => $lead['company']],
                        ['source' => $lead['source'], 'status' => $lead['status'], 'lead_date' => $leadDate]
                    );
                }

                foreach ($opportunityTemplates as $opportunityIndex => $opportunity) {
                    $closeDate = sprintf('%04d-%02d-%02d', $year, $index + 1, min($opportunity['day'], 28));

                    DB::table('CRM_Top_Opportunities')->updateOrInsert(
                        ['year' => $year, 'month' => $month, 'opportunity' => $opportunity['opportunity'], 'company' => $opportunity['company']],
                        [
                            'value' => $opportunity['value'] + (($year === 2026 && $month === 'June') ? 0 : ($periodNumber * 180)),
                            'stage' => $opportunity['stage'],
                            'close_date' => $closeDate,
                        ]
                    );
                }
            }
        }

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
