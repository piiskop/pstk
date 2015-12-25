-- Create table
CREATE TABLE scores (
	id INT UNSIGNED NOT NULL PRIMARY KEY,
	score DECIMAL(5,2) NOT NULL
);

-- Rename table
RENAME TABLE scores TO test_scores;

-- Drop primary key
ALTER TABLE test_scores
	DROP PRIMARY KEY;

-- Add primary key
ALTER TABLE test_scores
	ADD PRIMARY KEY(id);
	
-- Add auto increment
ALTER TABLE test_scores
	MODIFY id INT UNSIGNED NOT NULL AUTO_INCREMENT;

-- Add columns
ALTER TABLE test_scores
	ADD student VARCHAR(50) NOT NULL AFTER id,
	ADD	delete_this BOOL;

-- Delete column
ALTER TABLE test_scores
	DROP delete_this;

-- Change column (rename, change datatype)
ALTER TABLE test_scores
	CHANGE student student_id INT NOT NULL;

-- Modify column (change datatype)
ALTER TABLE test_scores
	MODIFY student_id INT UNSIGNED NOT NULL;

-- Alter column
ALTER TABLE test_scores
	ALTER score
	SET DEFAULT 50.00;

-- Add foreign key (table `students` in kaia_types.sql)
ALTER TABLE test_scores
	ADD CONSTRAINT fk_test_scores_student
	FOREIGN KEY (student_id)
	REFERENCES students(id);
	
-- Create simple index
CREATE INDEX test_scores_idx
	ON test_scores (score);

-- Create unique index
ALTER TABLE test_scores
	ADD UNIQUE test_scores_uidx (id, student_id);