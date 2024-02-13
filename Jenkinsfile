pipeline {
    agent any

    stages {
        stage('RUNNING PHP CODE') {
            steps {
                bat "xcopy * E:\\xampp-portable-windows-x64-7.2.34-2-VC15\\xampp\\htdocs\\dashboard /Y"
            }
        }
        stage('HIT URL') {
            steps {
                script {
                    // Using PowerShell to invoke a web request
                    powershell 'Invoke-WebRequest -Uri http://localhost/dashboard/index.php'
                }
            }
        }
    }
}
