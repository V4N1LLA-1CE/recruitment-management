DROP DATABASE IF EXISTS `a5_db`;
CREATE DATABASE `a5_db`;
USE `a5_db`;
CREATE TABLE `users` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `first_name` varchar(255),
  `last_name` varchar(255),
  `email` varchar(255),
  `password` varchar(96)
);
CREATE TABLE `contractors` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `first_name` varchar(255),
  `last_name` varchar(255),
  `phone_number` varchar(10),
  `contractor_email` varchar(255)
);
CREATE TABLE `projects` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `project_name` varchar(255),
  `description` text,
  `management_tool_link` varchar(255),
  `project_due_date` datetime,
  `last_checked` datetime,
  `complete` boolean,
  `contractor_id` integer,
  `organisation_id` integer
);
CREATE TABLE `organisations` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `business_name` varchar(255),
  `contact_first_name` varchar(255),
  `contact_last_name` varchar(255),
  `contact_email` varchar(255),
  `current_website` varchar(255),
  `industry` text
);
CREATE TABLE `contacts` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `first_name` varchar(255),
  `last_name` varchar(255),
  `email` varchar(255),
  `phone_number` varchar(10),
  `message` text,
  `organisation_id` integer,
  `contractor_id` integer
);
CREATE TABLE `skills` (
  `id` integer PRIMARY KEY AUTO_INCREMENT,
  `skill_name` text
);
CREATE TABLE `contractors_skills` (
  `contractor_id` integer NOT NULL,
  `skill_id` integer NOT NULL,
  PRIMARY KEY (`contractor_id`, `skill_id`)
);
CREATE TABLE `projects_skills` (
  `project_id` integer NOT NULL,
  `skill_id` integer NOT NULL,
  PRIMARY KEY (`project_id`, `skill_id`)
);

ALTER TABLE `projects`
  ADD FOREIGN KEY (`contractor_id`) REFERENCES `contractors` (`id`) ON DELETE CASCADE,
  ADD FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`) ON DELETE CASCADE;

ALTER TABLE `contacts`
  ADD FOREIGN KEY (`organisation_id`) REFERENCES `organisations` (`id`) ON DELETE CASCADE,
  ADD FOREIGN KEY (`contractor_id`) REFERENCES `contractors` (`id`) ON DELETE CASCADE;

ALTER TABLE `contractors_skills`
  ADD FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`) ON DELETE CASCADE,
  ADD FOREIGN KEY (`contractor_id`) REFERENCES `contractors` (`id`) ON DELETE CASCADE;

ALTER TABLE `projects_skills`
  ADD FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE,
  ADD FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`) ON DELETE CASCADE;

-- Insert contractors
INSERT INTO contractors (first_name, last_name, phone_number, contractor_email) VALUES
('John', 'Doe', '412345678', 'john.doe@example.com'),
('Jane', 'Smith', '412678901', 'jane.smith@example.com'),
('Michael', 'Brown', '412234567', 'michael.brown@example.com'),
('Emily', 'Davis', '412987654', 'emily.davis@example.com'),
('Sarah', 'Wilson', '412345987', 'sarah.wilson@example.com'),
('David', 'Johnson', '412567890', 'david.johnson@example.com'),
('Laura', 'Martinez', '412678234', 'laura.martinez@example.com'),
('Robert', 'Lee', '412789345', 'robert.lee@example.com'),
('Michelle', 'Harris', '412890456', 'michelle.harris@example.com'),
('William', 'Clark', '412901567', 'william.clark@example.com'),
('Jessica', 'Lewis', '412123456', 'jessica.lewis@example.com'),
('Brian', 'Walker', '412234678', 'brian.walker@example.com'),
('Olivia', 'Hall', '412345789', 'olivia.hall@example.com'),
('James', 'Allen', '412456890', 'james.allen@example.com'),
('Isabella', 'Young', '412567901', 'isabella.young@example.com'),
('Daniel', 'Wright', '412678012', 'daniel.wright@example.com'),
('Ava', 'Scott', '412789123', 'ava.scott@example.com'),
('Matthew', 'Adams', '412890234', 'matthew.adams@example.com'),
('Sophie', 'Nelson', '412901345', 'sophie.nelson@example.com'),
('Andrew', 'Carter', '412123567', 'andrew.carter@example.com'),
('Chloe', 'Mitchell', '412234678', 'chloe.mitchell@example.com'),
('Ethan', 'Roberts', '412345789', 'ethan.roberts@example.com'),
('Mia', 'Turner', '412456890', 'mia.turner@example.com'),
('Lucas', 'Phillips', '412567901', 'lucas.phillips@example.com'),
('Emma', 'Campbell', '412678012', 'emma.campbell@example.com'),
('Alexander', 'Parker', '412789123', 'alexander.parker@example.com'),
('Lily', 'Evans', '412890234', 'lily.evans@example.com'),
('Jacob', 'Edwards', '412901345', 'jacob.edwards@example.com'),
('Charlotte', 'Collins', '412123456', 'charlotte.collins@example.com'),
('Ryan', 'Stewart', '412234567', 'ryan.stewart@example.com'),
('Amelia', 'Morris', '412345678', 'amelia.morris@example.com'),
('Aiden', 'Rogers', '412456789', 'aiden.rogers@example.com'),
('Grace', 'Reed', '412567890', 'grace.reed@example.com'),
('Noah', 'Cook', '412678901', 'noah.cook@example.com'),
('Mia', 'Bell', '412789012', 'mia.bell@example.com'),
('Jack', 'Murphy', '412890123', 'jack.murphy@example.com'),
('Ella', 'Bailey', '412901234', 'ella.bailey@example.com'),
('Lucas', 'Rivera', '412123345', 'lucas.rivera@example.com'),
('Harper', 'Cooper', '412234456', 'harper.cooper@example.com'),
('Benjamin', 'Richardson', '412345567', 'benjamin.richardson@example.com'),
('Lily', 'Wood', '412456678', 'lily.wood@example.com'),
('Mason', 'Cox', '412567789', 'mason.cox@example.com'),
('Aria', 'Ward', '412678890', 'aria.ward@example.com'),
('James', 'Foster', '412789901', 'james.foster@example.com'),
('Zoe', 'James', '412890012', 'zoe.james@example.com'),
('Elijah', 'Bennett', '412901123', 'elijah.bennett@example.com'),
('Scarlett', 'Gray', '412123234', 'scarlett.gray@example.com'),
('Matthew', 'Simmons', '412234345', 'matthew.simmons@example.com'),
('Evelyn', 'Hayes', '412345456', 'evelyn.hayes@example.com'),
('Jack', 'Brooks', '412456567', 'jack.brooks@example.com');

-- Insert organisations
INSERT INTO organisations (business_name, contact_first_name, contact_last_name, contact_email, current_website, industry) VALUES
('Tech Innovators', 'John', 'Smith', 'john.smith@techinnovators.com', 'http://techinnovators.com', 'Technology'),
('Green Solutions', 'Emily', 'Johnson', 'emily.johnson@greensolutions.com', 'http://greensolutions.com', 'Environmental'),
('Future Enterprises', 'Michael', 'Brown', 'michael.brown@futureenterprises.com', 'http://futureenterprises.com', 'Consulting'),
('Health Hub', 'Sarah', 'Wilson', 'sarah.wilson@healthhub.com', 'http://healthhub.com', 'Healthcare'),
('FinServe Group', 'David', 'Clark', 'david.clark@finservegroup.com', 'http://finservegroup.com', 'Finance'),
('Smart Design', 'Laura', 'Martinez', 'laura.martinez@smartdesign.com', 'http://smartdesign.com', 'Design'),
('Auto Solutions', 'Robert', 'Lee', 'robert.lee@autosolutions.com', 'http://autosolutions.com', 'Automotive'),
('Urban Living', 'Michelle', 'Harris', 'michelle.harris@urbanliving.com', 'http://urbanliving.com', 'Real Estate'),
('Code Wizards', 'William', 'Walker', 'william.walker@codewizards.com', 'http://codewizards.com', 'Software'),
('Creative Minds', 'Jessica', 'Adams', 'jessica.adams@creativeminds.com', 'http://creativeminds.com', 'Marketing'),
('Secure IT', 'Brian', 'Mitchell', 'brian.mitchell@secureit.com', 'http://secureit.com', 'IT Security'),
('Global Trade', 'Olivia', 'Roberts', 'olivia.roberts@globaltrade.com', 'http://globaltrade.com', 'Logistics'),
('Elite Partners', 'James', 'Turner', 'james.turner@elitepartners.com', 'http://elitepartners.com', 'Partnerships'),
('Innovate Health', 'Isabella', 'Scott', 'isabella.scott@innovatehealth.com', 'http://innovatehealth.com', 'Healthcare'),
('NextGen Tech', 'Daniel', 'Carter', 'daniel.carter@nextgentech.com', 'http://nextgentech.com', 'Technology'),
('Bright Future', 'Ava', 'Wright', 'ava.wright@brightfuture.com', 'http://brightfuture.com', 'Education'),
('Green Earth', 'Mia', 'Young', 'mia.young@greenearth.com', 'http://greenearth.com', 'Environmental'),
('Finance Experts', 'Matthew', 'King', 'matthew.king@financeexperts.com', 'http://financeexperts.com', 'Finance'),
('Tech Pioneers', 'Sophie', 'Evans', 'sophie.evans@techpioneers.com', 'http://techpioneers.com', 'Technology'),
('HealthFirst', 'Andrew', 'Green', 'andrew.green@healthfirst.com', 'http://healthfirst.com', 'Healthcare'),
('Market Leaders', 'Chloe', 'Hall', 'chloe.hall@marketleaders.com', 'http://marketleaders.com', 'Marketing'),
('Visionary Designs', 'Ethan', 'Adams', 'ethan.adams@visionarydesigns.com', 'http://visionarydesigns.com', 'Design'),
('Auto Vision', 'Lily', 'Mitchell', 'lily.mitchell@autovision.com', 'http://autovision.com', 'Automotive'),
('Urban Tech', 'Jacob', 'Bennett', 'jacob.bennett@urbantech.com', 'http://urbantech.com', 'Technology'),
('Pro Health', 'Charlotte', 'Collins', 'charlotte.collins@prohealth.com', 'http://prohealth.com', 'Healthcare'),
('Innovative Solutions', 'Ryan', 'Wood', 'ryan.wood@innovativesolutions.com', 'http://innovativesolutions.com', 'Consulting'),
('NextGen Designs', 'Amelia', 'Stewart', 'amelia.stewart@nextgendesigns.com', 'http://nextgendesigns.com', 'Design'),
('Smart Living', 'Lucas', 'Young', 'lucas.young@smartliving.com', 'http://smartliving.com', 'Real Estate'),
('Elite Tech', 'Emma', 'Rogers', 'emma.rogers@elitetech.com', 'http://elitetech.com', 'Technology'),
('Global Solutions', 'Alexander', 'Price', 'alexander.price@globalsolutions.com', 'http://globalsolutions.com', 'Logistics'),
('FinTech Partners', 'Grace', 'Cooper', 'grace.cooper@fintechpartners.com', 'http://fintechpartners.com', 'Finance'),
('Tech Advance', 'Noah', 'Walker', 'noah.walker@techadvance.com', 'http://techadvance.com', 'Technology'),
('Creative Tech', 'Harper', 'James', 'harper.james@creativetech.com', 'http://creativetech.com', 'Design'),
('Health Innovators', 'James', 'Harris', 'james.harris@healthinnovators.com', 'http://healthinnovators.com', 'Healthcare'),
('Tech Savvy', 'Ella', 'Nelson', 'ella.nelson@techsavvy.com', 'http://techsavvy.com', 'Technology'),
('Smart Solutions', 'Zoe', 'Clark', 'zoe.clark@smartsolutions.com', 'http://smartsolutions.com', 'Consulting'),
('Future Health', 'Elijah', 'Scott', 'elijah.scott@futurehealth.com', 'http://futurehealth.com', 'Healthcare'),
('Finance Future', 'Scarlett', 'Green', 'scarlett.green@financefuture.com', 'http://financefuture.com', 'Finance'),
('Urban Innovators', 'Matthew', 'Lee', 'matthew.lee@urbaninnovators.com', 'http://urbaninnovators.com', 'Real Estate'),
('Tech Experts', 'Evelyn', 'Walker', 'evelyn.walker@techexperts.com', 'http://techexperts.com', 'Technology'),
('Global Ventures', 'Jack', 'Martinez', 'jack.martinez@globalventures.com', 'http://globalventures.com', 'Logistics'),
('Elite Finance', 'Emily', 'Roberts', 'emily.roberts@elitefinance.com', 'http://elitefinance.com', 'Finance'),
('Health Solutions', 'Benjamin', 'Adams', 'benjamin.adams@healthsolutions.com', 'http://healthsolutions.com', 'Healthcare'),
('Innovative Designs', 'Lily', 'Smith', 'lily.smith@innovative-designs.com', 'http://innovative-designs.com', 'Design'),
('Auto Experts', 'Mason', 'Brown', 'mason.brown@autoexperts.com', 'http://autoexperts.com', 'Automotive'),
('Tech Innovators', 'Aria', 'Green', 'aria.green@techinnovators.com', 'http://techinnovators.com', 'Technology'),
('NextGen Solutions', 'James', 'Wright', 'james.wright@nextgensolutions.com', 'http://nextgensolutions.com', 'Consulting'),
('Smart Health', 'Lily', 'Young', 'lily.young@smarthealth.com', 'http://smarthealth.com', 'Healthcare'),
('Finance Innovators', 'Jack', 'Evans', 'jack.evans@financeinnovators.com', 'http://financeinnovators.com', 'Finance'),
('Urban Future', 'Grace', 'Baker', 'grace.baker@urbanfuture.com', 'http://urbanfuture.com', 'Real Estate');

-- insert projects
insert into projects (project_name, description, management_tool_link, project_due_date, last_checked, complete, contractor_id, organisation_id) values
('alpha initiative', 'first phase of the new system development', 'http://pmtool.example.com/alpha', '2024-10-15', '2024-09-01', false, 7, 3),
('beta rollout', 'second phase implementation', 'http://pmtool.example.com/beta', '2024-11-01', '2024-09-05', false, 15, 6),
('client migration', 'migrate clients to the new platform', 'http://pmtool.example.com/migration', '2024-12-01', '2024-09-10', false, 12, 2),
('data analytics', 'develop data analytics tools', 'http://pmtool.example.com/analytics', '2024-10-30', '2024-09-12', true, 5, 1),
('employee training', 'training for new system users', 'http://pmtool.example.com/training', '2024-11-15', '2024-09-15', false, 19, 8),
('feature update', 'update key features in the application', 'http://pmtool.example.com/feature-update', '2024-12-15', '2024-09-18', false, 9, 4),
('security audit', 'conduct a security audit', 'http://pmtool.example.com/security', '2024-10-20', '2024-09-20', true, 1, 12),
('infrastructure upgrade', 'upgrade server infrastructure', 'http://pmtool.example.com/infrastructure', '2024-11-30', '2024-09-22', false, 14, 7),
('market research', 'research for new market opportunities', 'http://pmtool.example.com/market-research', '2024-12-10', '2024-09-25', false, 6, 11),
('customer feedback', 'analyze customer feedback and make improvements', 'http://pmtool.example.com/feedback', '2024-10-25', '2024-09-27', true, 11, 16),
('Sales Dashboard', 'Create a new sales dashboard', 'http://pmtool.example.com/sales-dashboard', '2024-10-05', '2024-09-28', FALSE, 3, 19),
('Product Launch', 'Launch the new product', 'http://pmtool.example.com/product-launch', '2024-11-10', '2024-09-30', FALSE, 2, 5),
('User Experience', 'Improve user experience based on feedback', 'http://pmtool.example.com/ux-improvement', '2024-12-05', '2024-10-01', FALSE, 20, 9),
('Tech Support', 'Enhance tech support services', 'http://pmtool.example.com/tech-support', '2024-10-15', '2024-10-02', FALSE, 13, 14),
('Data Migration', 'Migrate historical data to new system', 'http://pmtool.example.com/data-migration', '2024-11-05', '2024-10-04', FALSE, 10, 18),
('API Integration', 'Integrate new APIs', 'http://pmtool.example.com/api-integration', '2024-12-01', '2024-10-07', FALSE, 8, 20),
('Client Onboarding', 'Onboard new clients', 'http://pmtool.example.com/client-onboarding', '2024-10-20', '2024-10-10', TRUE, 18, 15),
('Performance Tuning', 'Tune application performance', 'http://pmtool.example.com/performance-tuning', '2024-11-20', '2024-10-12', FALSE, 4, 2),
('Backup System', 'Implement new backup system', 'http://pmtool.example.com/backup-system', '2024-12-20', '2024-10-15', FALSE, 16, 6),
('Compliance Check', 'Ensure compliance with new regulations', 'http://pmtool.example.com/compliance', '2024-10-25', '2024-10-17', TRUE, 17, 4),
('Mobile App', 'Develop a mobile application', 'http://pmtool.example.com/mobile-app', '2024-11-30', '2024-10-20', FALSE, 22, 10),
('Customer Portal', 'Build a new customer portal', 'http://pmtool.example.com/customer-portal', '2024-12-15', '2024-10-22', FALSE, 21, 7),
('Internal Audit', 'Conduct an internal audit', 'http://pmtool.example.com/internal-audit', '2024-10-10', '2024-10-25', TRUE, 15, 11),
('Website Redesign', 'Redesign the company website', 'http://pmtool.example.com/website-redesign', '2024-11-10', '2024-10-27', FALSE, 9, 12),
('Vendor Management', 'Improve vendor management processes', 'http://pmtool.example.com/vendor-management', '2024-12-01', '2024-10-30', FALSE, 4, 13),
('Staff Recruitment', 'Recruit new staff members', 'http://pmtool.example.com/staff-recruitment', '2024-10-15', '2024-11-01', FALSE, 6, 18),
('Product Update', 'Update existing products', 'http://pmtool.example.com/product-update', '2024-11-20', '2024-11-03', FALSE, 13, 14),
('Client Feedback', 'Collect and analyze client feedback', 'http://pmtool.example.com/client-feedback', '2024-12-10', '2024-11-05', FALSE, 11, 6),
('Server Maintenance', 'Perform server maintenance', 'http://pmtool.example.com/server-maintenance', '2024-10-30', '2024-11-07', TRUE, 20, 9),
('Software Upgrade', 'Upgrade the core software', 'http://pmtool.example.com/software-upgrade', '2024-11-15', '2024-11-10', FALSE, 7, 3),
('HR System', 'Implement new HR system', 'http://pmtool.example.com/hr-system', '2024-12-01', '2024-11-12', FALSE, 15, 1),
('Data Analysis', 'Analyze current data trends', 'http://pmtool.example.com/data-analysis', '2024-10-25', '2024-11-15', TRUE, 19, 8),
('CRM Integration', 'Integrate with new CRM', 'http://pmtool.example.com/crm-integration', '2024-11-30', '2024-11-18', FALSE, 8, 13),
('Event Planning', 'Plan and execute company events', 'http://pmtool.example.com/event-planning', '2024-12-10', '2024-11-20', FALSE, 14, 17),
('Employee Wellness', 'Develop employee wellness programs', 'http://pmtool.example.com/wellness', '2024-10-15', '2024-11-22', FALSE, 2, 12),
('Data Security', 'Enhance data security measures', 'http://pmtool.example.com/data-security', '2024-11-05', '2024-11-25', TRUE, 10, 4),
('API Development', 'Develop new APIs', 'http://pmtool.example.com/api-development', '2024-12-15', '2024-11-27', FALSE, 16, 7),
('Client Support', 'Improve client support services', 'http://pmtool.example.com/client-support', '2024-10-20', '2024-12-01', FALSE, 21, 18),
('Training Materials', 'Create training materials', 'http://pmtool.example.com/training-materials', '2024-11-10', '2024-12-05', TRUE, 6, 16),
('Employee Onboarding', 'Improve employee onboarding process', 'http://pmtool.example.com/employee-onboarding', '2024-12-01', '2024-12-07', FALSE, 12, 2),
('IT Infrastructure', 'Upgrade IT infrastructure', 'http://pmtool.example.com/it-infrastructure', '2024-10-15', '2024-12-10', FALSE, 13, 5),
('Customer Support', 'Enhance customer support capabilities', 'http://pmtool.example.com/customer-support', '2024-11-25', '2024-12-12', TRUE, 17, 10),
('Product Documentation', 'Update product documentation', 'http://pmtool.example.com/product-docs', '2024-12-10', '2024-12-15', FALSE, 9, 12),
('Vendor Integration', 'Integrate with new vendors', 'http://pmtool.example.com/vendor-integration', '2024-10-20', '2024-12-18', FALSE, 14, 19),
('Compliance Training', 'Provide compliance training', 'http://pmtool.example.com/compliance-training', '2024-11-15', '2024-12-20', FALSE, 20, 6),
('Website Maintenance', 'Perform website maintenance', 'http://pmtool.example.com/website-maintenance', '2024-12-01', '2024-12-22', TRUE, 11, 13),
('Marketing Campaign', 'Execute new marketing campaign', 'http://pmtool.example.com/marketing-campaign', '2024-10-30', '2024-12-25', FALSE, 15, 2),
('Client Retention', 'Develop client retention strategies', 'http://pmtool.example.com/client-retention', '2024-11-05', '2024-12-27', FALSE, 18, 9),
('Technology Assessment', 'Assess new technology trends', 'http://pmtool.example.com/technology-assessment', '2024-12-15', '2024-12-30', FALSE, 5, 16),
('Strategic Planning', 'Plan for the next fiscal year', 'http://pmtool.example.com/strategic-planning', '2024-10-25', '2024-12-31', TRUE, 2, 11);
