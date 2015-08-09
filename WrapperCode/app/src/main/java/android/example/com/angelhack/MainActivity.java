package android.example.com.angelhack;

import android.app.AlertDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.net.Uri;
import android.support.v7.app.ActionBarActivity;
import android.os.Bundle;
import android.webkit.WebView;
import android.webkit.WebViewClient;


public class MainActivity extends ActionBarActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        //Simple Server-controled Welcome Screen Implementation Wrapper-Style
        //More complex implementation possible but time constraints leave us little choice

        //Code to be inserted starts here
        AlertDialog.Builder alert = new AlertDialog.Builder(this);
        alert.setTitle("AngelHack Demo");

        WebView wv = new WebView(this);
        wv.getSettings().setJavaScriptEnabled(true);
        wv.loadUrl("http://54.85.6.196/displayAd.php?appid=2"); //change appid here depending on application

        //ensure that clicking a link will not open in the webview
        wv.setWebViewClient(new WebViewClient() {
            @Override
            public boolean shouldOverrideUrlLoading(WebView view, String url) {
                if (url != null && url.contains("play.google.com")) {
                    view.getContext().startActivity(
                            new Intent(Intent.ACTION_VIEW, Uri.parse(url)));
                    return true;
                } else {
                    return false;
                }
            }
        });

        alert.setView(wv);
        alert.setNegativeButton("Dismiss", new DialogInterface.OnClickListener() {
            @Override
            public void onClick(DialogInterface dialog, int id) {
                dialog.dismiss();
            }
        });
        alert.show();
        //Code to be inserted ends here

    }
}
