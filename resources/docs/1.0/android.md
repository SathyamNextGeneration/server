# Android

---

- [Thinkin cab User Application](#section-1)
- [Thinkin cab Provider/Driver Application](#section-2)

<a name="section-1"></a>

##Thinkin cab User Application:
1. Extract the android package.
2. Open the Thinkin cab package in Android Studio and wait till the Gradle build successfully.
3. On the project explorer window of Android studio, find and edit the following files Gradle Scripts/build.gradle (Module: app).

        a. applicationId “com.Thinkincab.app” -> change this to your app’s Bundle ID

    <img src="/docs/img1.png"></img>

        b. change values and the credentials in the screenshot down below


4. Configure your Application on the Google Firebase console, enable authentication and Databasebase for the chat and download the googleservices.json, and     replace them in app/ folder.
5. Change the splash screen and icon for your own brand.

    Open the project folder from the PC and follow the below-mentioned path: Thinkin cab->app->src->main->res
    You will find ‘mipmap’ folders in the different resolution names, you must save the icons and splash screens in these folders according to the device size.

Also, You will find ‘drawable’ folders in the different resolution names, you must save the icons and splash screens in these folders too according to the device size.
Now hit on the ‘run’ button the application will run successfully in the virtual device.
If you are planning to upload the app in the Play Store, you must generate the build. To do so, click on ‘Build’ in Android Studio, choose ‘Generate Signed APK’ from the drop-down. Now, click on create new and hit ‘Next’ to proceed.
Choose the path to the location where you want to save the key, give a folder name for the key and click ‘OK’. Enter the information in the fields and click on ‘Finish’.
The APK will be generated and stored in the folder named by you.

<a name="section-2"></a>
##Thinkin cab Provider/Driver Application

1. Extract the android package.

2. Open the Thinkin cab package in Android Studio and wait till the Gradle build successfully.

3. On the project explorer window of Android studio, find and edit the following files

    a. Gradle Scripts/build.gradle (Module: driver)

    i. applicationId “com.Thinkin_cab.driver” -> change this to your app’s Bundle ID 
    ii.    <img src="/docs/img1.png"></img>
4. Configure your Application on the same project in Google Firebase console, and download the googleservices.json, and replace them in app/ folder.

 5. Change the splash screen and icon for your own brand.

Open the project folder from the PC and follow the below-mentioned path: Thinkin cab->app->src->main->res
You will find ‘mipmap’ folders in the different resolution names, you must save the icons and splash screens in these folders according to the device size.
Also, You will find ‘drawable’ folders in the different resolution names, you must save the icons and splash screens in these folders too according to the device size.
Now hit on the ‘run’ button the application will run successfully in the virtual device.
If you are planning to upload the app in the Play Store, you must generate the build. To do so, click on ‘Build’ in Android Studio, choose ‘Generate Signed APK’ from the drop-down. Now, click on create new and hit ‘Next’ to proceed.
Choose the path to the location where you want to save the key, give a folder name for the key and click ‘OK’. Enter the information in the fields and click on ‘Finish’.
The APK will be generated and stored in the folder named by you.

<h2>We Recommend Cloudways Servers for get the best out of the app</h2>
<a href="https://www.cloudways.com/en/laravel-hosting.php?id=315139&amp;a_bid=f2023ff7" target="_top"><img src="https://www.cloudways.com/affiliate/accounts/default1/banners/f2023ff7.jpg" alt="Faster Laravel Hosting" title="Faster Laravel Hosting" width="728" height="90" /></a><img style="border:0" src="https://www.cloudways.com/affiliate/scripts/imp.php?id=315139&amp;a_bid=f2023ff7" width="1" height="1" alt="" />