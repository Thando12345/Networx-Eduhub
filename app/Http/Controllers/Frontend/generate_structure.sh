#!/bin/bash

# Define the Laravel project directory path
PROJECT_PATH="/path/to/laravel-boilerplate-master"  # Replace with your project path

# Check if the project directory exists
if [ -d "$PROJECT_PATH" ]; then
    echo "Project directory found at $PROJECT_PATH"
else
    echo "Error: Project directory not found at $PROJECT_PATH"
    exit 1
fi

# Move into the Laravel project directory
cd "$PROJECT_PATH"

# Generate the folder and file structure for specific directories and files using 'tree' and save it to a file
OUTPUT_FILE="New_boilerplate_structure.txt"
# Filter for specific directories and files
tree -a -I 'node_modules|vendor' | grep -E 'view|model|app|models|web\.php' > "$OUTPUT_FILE"

# Confirm the structure has been saved
if [ -f "$OUTPUT_FILE" ]; then
    echo "The detailed structure has been saved to $OUTPUT_FILE"
else
    echo "Error: Failed to save the structure"
fi
