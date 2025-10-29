-- SELECTION DATA

CREATE TABLE pages (
    page_id VARCHAR(3) PRIMARY KEY,
    page_type VARCHAR(50),
    description VARCHAR(50),
    image VARCHAR(50)
)ENGINE=InnoDB;

CREATE TABLE sections (
	section_id VARCHAR(10) PRIMARY KEY,
    type VARCHAR(50)
)ENGINE=InnoDB;

CREATE TABLE employment (
	employment_id VARCHAR(2) PRIMARY KEY,
    employment_type VARCHAR(50)
)ENGINE=InnoDB;

CREATE TABLE modes (
    mode_id VARCHAR(2) PRIMARY KEY,
    `mode` VARCHAR(50)
)ENGINE=InnoDB;

CREATE TABLE proficiencies (
    proficiency_id VARCHAR(10) PRIMARY KEY,
    proficiency VARCHAR(50)
)ENGINE=InnoDB;

-- USER

CREATE TABLE users (
	user_id VARCHAR(10) PRIMARY KEY,
    name VARCHAR(50),
    phone_number VARCHAR(20),
    gender VARCHAR(50),
    dob DATE,
    country VARCHAR(50) NULL,
    city VARCHAR(50) NULL,
    email VARCHAR(50),
    `password` VARCHAR(255),
    headline VARCHAR(255) DEFAULT '--',
    profile_image VARCHAR(255) DEFAULT 'empty_user_profile.png',
    cover_image VARCHAR(255) DEFAULT 'empty_user_cover.png'
)ENGINE=InnoDB;

-- PAGE

CREATE TABLE companies (
	company_id VARCHAR(10) PRIMARY KEY,
    page_id VARCHAR(3),
    name VARCHAR(50),
    industry VARCHAR(50),
    tagline VARCHAR(250) NULL,
    established_date DATE,
    country VARCHAR(50),
    city VARCHAR(50),
   	logo VARCHAR(255) DEFAULT 'empty_company_profile.png',
    cover_image VARCHAR(255) DEFAULT 'empty_company_cover.png',

    FOREIGN KEY (page_id) REFERENCES pages(page_id)
    ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB;

CREATE TABLE subsidiary (
    company_id VARCHAR(10) PRIMARY KEY,
    parent_id VARCHAR(10),

    FOREIGN KEY (company_id) REFERENCES companies(company_id)
    ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (parent_id) REFERENCES companies(company_id)
    ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB;

CREATE TABLE access_management (
    company_id VARCHAR(10),
    user_id VARCHAR(10),

    PRIMARY KEY (company_id, user_id),
    FOREIGN KEY (company_id) REFERENCES companies(company_id)
    ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
    ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB;

CREATE TABLE company_roles (
    user_id VARCHAR(10),
    company_id VARCHAR(10),
    role VARCHAR(10),

    PRIMARY KEY (user_id, company_id),
    FOREIGN KEY (user_id) REFERENCES users(user_id)
    ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (company_id) REFERENCES companies(company_id)
    ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB;

-- IF PAGE EDUCATION

CREATE TABLE majors (
    major_id INT AUTO_INCREMENT PRIMARY KEY, 
    company_id VARCHAR(10),
    major VARCHAR(50),

    FOREIGN KEY (company_id) REFERENCES companies(company_id)
    ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB;

-- JOB

CREATE TABLE jobs (
    job_id VARCHAR(10) PRIMARY KEY,
    company_id VARCHAR(10),
    title VARCHAR(50),
    description TEXT,
    employment_id VARCHAR(2),
    mode_id VARCHAR(2),
    sallary INT,
    posted_date DATE,
    
    FOREIGN KEY (company_id) REFERENCES companies(company_id)
    ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (employment_id) REFERENCES employment(employment_id)
    ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (mode_id) REFERENCES modes(mode_id)
    ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB;

CREATE TABLE detail_subsec (
    sub_section_id INT AUTO_INCREMENT PRIMARY KEY,
    job_id VARCHAR(10),
    sub_title VARCHAR(50)
)ENGINE=InnoDB;

CREATE TABLE detail_point (
    detail_point_id INT AUTO_INCREMENT PRIMARY KEY,
    sub_section_id INT,
    point VARCHAR(50),

    FOREIGN KEY (sub_section_id) REFERENCES detail_subsec(sub_section_id)
    ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB;

CREATE TABLE applicants (
    applicant_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id VARCHAR(10),
    job_id VARCHAR(10),
    resume_file TEXT,
    `status` VARCHAR(50) DEFAULT 'On Progress',

    FOREIGN KEY (user_id) REFERENCES users(user_id)
    ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (job_id) REFERENCES jobs(job_id)
    ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB;

-- SOCIAL

CREATE TABLE follows (
	user_id VARCHAR(10),
    company_id VARCHAR(10),
    
    PRIMARY KEY (user_id, company_id),
    FOREIGN KEY (user_id) REFERENCES users(user_id)
    ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (company_id) REFERENCES companies(company_id)
    ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB;

CREATE TABLE connections (
	user_id VARCHAR(10),
   	user_target VARCHAR(10),
    `status` VARCHAR(50) DEFAULT 'Pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	
    PRIMARY KEY (user_id, user_target),
    FOREIGN KEY (user_id) REFERENCES users(user_id)
    ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (user_target) REFERENCES users(user_id)
    ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB;

CREATE TABLE posts (
	post_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id VARCHAR(10),
    description TEXT,
    
    FOREIGN KEY (user_id) REFERENCES users(user_id)
    ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB;

CREATE TABLE post_images (
    images_id INT AUTO_INCREMENT PRIMARY KEY,
    post_id INT,
    image,

    FOREIGN KEY (post_id) REFERENCES posts(post_id)
    ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB;

CREATE TABLE comments (
    comment_id INT AUTO_INCREMENT PRIMARY KEY,
    post_id INT,
    user_id VARCHAR(10),
    comment TEXT,

    FOREIGN KEY (post_id) REFERENCES posts(post_id)
    ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
    ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB;

CREATE TABLE likes (
    post_id INT,
    user_id VARCHAR(10),

    FOREIGN KEY (post_id) REFERENCES posts(post_id)
    ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
    ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB;

CREATE TABLE messages (
    message_id INT AUTO_INCREMENT PRIMARY KEY,
    sender_id VARCHAR(10),
    receiver_id VARCHAR(10),
    message TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (sender_id) REFERENCES users(user_id)
    ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (receiver_id) REFERENCES users(user_id)
    ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB;

CREATE TABLE notifications (
    notification_id INT AUTO_INCREMENT PRIMARY KEY,


)ENGINE=InnoDB;


-- PROFILE

CREATE TABLE about (
	user_id VARCHAR(10),
    description TEXT,
    section_id VARCHAR(10),
    
    FOREIGN KEY (user_id) REFERENCES users(user_id)
    ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (section_id) REFERENCES sections(section_id)
    ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB;

CREATE TABLE user_language (
	user_id VARCHAR(10),
    `language` VARCHAR(50),
    proficiency_id VARCHAR(10),
    section_id VARCHAR(10),

    FOREIGN KEY (user_id) REFERENCES users(user_id)
    ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (proficiency_id) REFERENCES proficiencies(proficiency_id)
    ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (section_id) REFERENCES sections(section_id)
    ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB;

CREATE TABLE user_skill (
    skill_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id VARCHAR(10),
    skill VARCHAR(50),
    company_id VARCHAR(10),
    section_id VARCHAR(10),
    
    FOREIGN KEY (user_id) REFERENCES users(user_id)
    ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (company_id) REFERENCES companies(company_id)
    ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (section_id) REFERENCES sections(section_id)
    ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB;

CREATE TABLE user_certificate (
    certificate_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id VARCHAR(10),
    company_id VARCHAR(10),
    title VARCHAR(50),
    skill VARCHAR(50),
    description TEXT,
    issue_date DATE,
    credential VARCHAR(50),
    image TEXT,
    section_id VARCHAR(10),
    
    FOREIGN KEY (user_id) REFERENCES users(user_id)
    ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (company_id) REFERENCES companies(company_id)
    ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (section_id) REFERENCES sections(section_id)
    ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB;

CREATE TABLE user_educations (
    user_id VARCHAR(10),
    company_id VARCHAR(10),
    major_id INT,
	start_date DATE,
	end_date DATE,
    GPA DECIMAL(10,2),
    description TEXT,
    section_id VARCHAR(10),
    
	PRIMARY KEY (user_id, major_id),
    FOREIGN KEY (user_id) REFERENCES users(user_id)
    ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (company_id) REFERENCES companies(company_id)
    ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (major_id) REFERENCES majors(major_id)
    ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (section_id) REFERENCES sections(section_id)
    ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB;

CREATE TABLE user_experiences (
	experience_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id VARCHAR(10),
    company_id VARCHAR(10),
    title VARCHAR(50),
    position VARCHAR(50),
    employment_id VARCHAR(2),
    mode_id VARCHAR(2),
    start_date DATE,
    end_date DATE,
    section_id VARCHAR(10),
    
    FOREIGN KEY (employment_id) REFERENCES employment(employment_id)
    ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (company_id) REFERENCES companies(company_id)
    ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (mode_id) REFERENCES modes(mode_id)
    ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (section_id) REFERENCES sections(section_id)
    ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB;


