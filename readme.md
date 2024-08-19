# Installation Guide

Welcome to the installation guide for this forked version of OpenCart 4.  
This version utilizes environmental variables to manage project settings across different environments.  
Follow these steps to set up and configure your installation:

## Step 1. **Configure Environment Variables**

1. **Copy the Environment File**:

   - Copy the `.env.sample` file to `.env`. 
   - For local development, you can use `.env.local`

     ```bash
     cp .env.sample .env
     ```

2. **Edit the `.env` File**:

   - Open the `.env` file in a text editor of your choice.
   - Configure the file with the correct database credentials and other environment-specific settings. 
   - Ensure that all required environment variables are set according to your setup.

## Step 2. **Install Dependencies**

1. **Run Composer Command**:

   ```bash
   composer install
   ```

## Step 3. **Create the Database Schema**

1. **Run the Installation Command**:
   
   - Execute the installation script on your terminal to set up the database schema. 
   - This script will create the necessary database tables and initial configuration.

     ```bash
     ./bin/install
     ```

   - Ensure that you have the necessary permissions to run the script and that your environment is correctly configured.

## Step 4. **Access Your Site**

1. **Visit the Frontend**:

   - Open your web browser and navigate to the URL of your site:

     ```
     http://your-domain.com
     ```
   - You should see your site’s homepage and be able to explore its features.

## Step 5. **Access the Admin Panel**

1. **Visit the Admin Interface**:

   - Open your web browser and navigate to the admin panel login page:

     ```
     http://your-domain.com/admin
     ```

2. **Login with Default Credentials**:

   - Use the following default credentials to log in:

     - **Username**: `admin`
     - **Password**: `12345678`

   - For security reasons, it's highly recommended to change the default password immediately after logging in.

## Additional Information

- **Environment Configuration**: Ensure that your environment configuration in the `.env` file is secure and suitable for production use. Avoid committing sensitive information to version control.
  
- **Database Setup**: If you encounter issues with the database setup, check your `.env` file for correct database credentials and permissions.

- **Support and Documentation**: For further assistance or detailed documentation, please refer to the [OpenCart documentation](https://docs.opencart.com/) or reach out to the community forums.

Thank you for using our forked version of OpenCart 4. Enjoy your enhanced e-commerce experience!
