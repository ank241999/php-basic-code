pipeline {
    agent any

    stages {
        stage('RUNNING PHP CODE') {
            steps {
                bat "xcopy * E:\\xampp-portable-windows-x64-7.2.34-2-VC15\\xampp\\htdocs\\dashboard /Y"
                bat "newman -v"
            }
        }
        stage('HIT URL') {
            steps {
                script {
                    // Using PowerShell to invoke a web request with basic parsing
                    powershell 'Invoke-WebRequest -Uri http://localhost/dashboard/index.php -UseBasicParsing'
                }
            }
        }
    }
}
