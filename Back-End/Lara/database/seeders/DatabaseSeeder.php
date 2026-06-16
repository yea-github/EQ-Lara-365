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
        User::query()->updateOrCreate(
            ['user_name' => 'john-123'],
            [
                'first_name' => 'John',
                'last_name' => 'Baptist',
                'privilege' => 'user',
                'password' => Hash::make('123456'),
            ]
        );

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

        foreach (range(2020, 2026) as $year) {
            foreach ($months as $index => $month) {
                if ($year === 2026 && $index > 4) {
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

                if ($year === 2026 && $index > 4) {
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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
