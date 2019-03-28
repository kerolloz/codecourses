  apt-get update

echo "Downloading packages";
  apt-get install gcc g++ python3 python3-pip python3-pdfkit python3-pypdf2 wkhtmltopdf;
pip3 install beautifulsoup4 pdfkit PyPDF2 flask;

  apt-get install \
    apt-transport-https \
    ca-certificates \
    curl \
    software-properties-common \
    wget

curl -fsSL https://download.docker.com/linux/ubuntu/gpg |   apt-key add -

  apt-key fingerprint 0EBFCD88

echo "WARNING: Ubuntu 18.10 users may have problems with the following command";
  add-apt-repository \
    "deb [arch=amd64] https://download.docker.com/linux/ubuntu \
   $(lsb_release -cs) \
    stable"
echo "SOLUTION: open the script, replace $(lsb_release -cs) with Bionic";

echo "Installing docker";
  apt-get update
  apt-get install docker-ce

# If you would like to use Docker as a non-root user
# you should now consider adding your user to the “docker” group
# with something like:
  usermod -aG docker $USER
  usermod -aG docker daemon
  docker pull kerolloz/codecourses_judge
# Remember to log out and back in for this to take effect!

read -p  "Do you want to download XAMPP? (Y/N): " user_choice;

if [ "$user_choice" = "Y" ]; then
    echo "Downloading XAMPP";
    wget https://www.apachefriends.org/xampp-files/7.2.12/xampp-linux-x64-7.2.12-0-installer.run
    chmod +x ./xampp-linux-x64-7.2.12-0-installer.run
      ./xampp-linux-x64-7.2.12-0-installer.run
fi

echo "You should restart your device for changes to take effect!";
read -p "Do you want to restart now? (Y/N): " user_choice;

if [ "$user_choice" = "Y" ]; then
    reboot;
else
    echo "Docker Commands may not work properly!";
fi
