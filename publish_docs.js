const fs = require('fs');
const path = require('path');

// Function to copy directory recursively
function copyDirSync(source, target) {
    // Create target directory if it doesn't exist
    if (!fs.existsSync(target)) {
        fs.mkdirSync(target);
    }

    // Get all files and sub-directories in the source directory
    const files = fs.readdirSync(source);

    // Copy each file/directory to the target directory
    files.forEach((file) => {
        const srcPath = path.join(source, file);
        const destPath = path.join(target, file);

        // Check if the current item is a file or directory
        if (fs.lstatSync(srcPath).isDirectory()) {
            // Recursively copy sub-directory
            copyDirSync(srcPath, destPath);
        } else {
            // Copy file
            fs.copyFileSync(srcPath, destPath);
        }
    });
}

// Function to clean directory recursively
function cleanDirSync(directory) {
    if (fs.existsSync(directory)) {
        fs.readdirSync(directory).forEach((file) => {
            const filePath = path.join(directory, file);
            if (fs.lstatSync(filePath).isDirectory()) {
                // Recursively clean sub-directory
                cleanDirSync(filePath);
            } else {
                // Remove file
                fs.unlinkSync(filePath);
            }
        });
        // Remove directory
        fs.rmdirSync(directory);
    }
}

function copyAssetsToDistAssets() {
    const sourceDir = './docs/assets';
    const destinationDir = './docs/.vitepress/dist/assets';

    copyDirSync(sourceDir, destinationDir);
}

function copyDistToPublicDocs() {
    const sourceDir = './docs/.vitepress/dist';
    const destinationDir = './public/docs';

    cleanDirSync(destinationDir);
    copyDirSync(sourceDir, destinationDir);
}

try {
    copyAssetsToDistAssets()
    copyDistToPublicDocs()
    console.log(`\nNew build copied to ./public/docs successfully.\n`);
} catch (err) {
    console.error('Error copying docs:', err);
}
