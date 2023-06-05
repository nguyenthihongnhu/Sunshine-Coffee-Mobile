package com.manager.thesunshine.activity;

import android.content.Context;
import android.content.Intent;
import android.net.ConnectivityManager;
import android.net.NetworkInfo;
import android.os.Bundle;
import android.view.View;
import android.view.animation.Animation;
import android.view.animation.AnimationUtils;
import android.widget.AdapterView;
import android.widget.FrameLayout;
import android.widget.ImageView;
import android.widget.ListView;
import android.widget.TextView;
import android.widget.Toast;
import android.widget.ViewFlipper;

import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.Toolbar;
import androidx.core.view.GravityCompat;
import androidx.drawerlayout.widget.DrawerLayout;
import androidx.recyclerview.widget.GridLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import com.bumptech.glide.Glide;
import com.manager.techno.R;
import com.manager.thesunshine.adapter.LoaiSpAdapter;
import com.manager.thesunshine.adapter.SanPhamMoiAdapter;
import com.manager.thesunshine.model.LoaiSp;
import com.manager.thesunshine.model.SanPhamMoi;
import com.manager.thesunshine.model.User;
import com.manager.thesunshine.retrofig.ApiBanHang;
import com.manager.thesunshine.retrofig.RetrofitClient;
import com.manager.thesunshine.utils.Utils;
import com.google.android.material.navigation.NavigationView;
import com.nex3z.notificationbadge.NotificationBadge;

import java.util.ArrayList;
import java.util.List;

import io.paperdb.Paper;
import io.reactivex.rxjava3.android.schedulers.AndroidSchedulers;
import io.reactivex.rxjava3.disposables.CompositeDisposable;
import io.reactivex.rxjava3.schedulers.Schedulers;

public class MainActivity extends AppCompatActivity {
    Toolbar toolbar;
    ViewFlipper viewFlipper;
    RecyclerView recyclerViewManHinhChinh;
    NavigationView navigationView;
    ListView listViewManHinhChinh;
    DrawerLayout drawerLayout;
    LoaiSpAdapter loaiSpAdapter;
    List<LoaiSp> mangloaisp;
    CompositeDisposable compositeDisposable = new CompositeDisposable();
    ApiBanHang apiBanHang;
    List<SanPhamMoi> mangSpMoi;
    SanPhamMoiAdapter spAdapter;
    NotificationBadge badge;
    FrameLayout frameLayout;
    ImageView imgsearch;
    TextView tennguoidung, gmailnguoidung;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        apiBanHang = RetrofitClient.getInstance(Utils.BASE_URL).create(ApiBanHang.class);
        Paper.init(this);
        if(Paper.book().read("user") != null){
            User user = Paper.book().read("user");
            Utils.user_current = user;
        }

        AnhXa();
        ActionBar();

        if(isConnected(this)){
//            Toast.makeText(getApplicationContext(),"Kết nối thành công.", Toast.LENGTH_LONG).show();
            ActionViewFlipper();
            getLoaiSanPham();
            getSpMoi();
            getEventClick();
        }else{
            Toast.makeText(getApplicationContext(),"Không có Internet, Vui lòng kết nối", Toast.LENGTH_LONG).show();
        }
    }

    private void getEventClick() {
        listViewManHinhChinh.setOnItemClickListener(new AdapterView.OnItemClickListener() {

            @Override
            public void onItemClick(AdapterView<?> parent, View view, int position, long id) {
                switch (position) {
                    case 0:
                        Intent trangchu = new Intent(getApplicationContext(), MainActivity.class);
                        startActivity(trangchu);
                        break;
                    case 1:
                        Intent caphetruyenthong = new Intent(getApplicationContext(), SanPhamActivity.class);
//                        dienthoai.putExtra("loai", mangloaisp.get(position).getId());
                        caphetruyenthong.putExtra("loai", position);
                        caphetruyenthong.putExtra("title", "Cà Phê Truyền Thống");
                        startActivity(caphetruyenthong);
                        break;
                    case 2:
                        Intent CaPheEspresso = new Intent(getApplicationContext(), SanPhamActivity.class);
//                        dienthoai.putExtra("loai", mangloaisp.get(position).getId());
                        CaPheEspresso.putExtra("loai", position);
                        CaPheEspresso.putExtra("title", "Cà Phê Espresso");
                        startActivity(CaPheEspresso);
                        break;
                    case 3:
                        Intent phindi = new Intent(getApplicationContext(), SanPhamActivity.class);
//                        dienthoai.putExtra("loai", mangloaisp.get(position).getId());
                        phindi.putExtra("loai", position);
                        phindi.putExtra("title", "PhinDi");
                        startActivity(phindi);
                        break;
                    case 4:
                        Intent freeze = new Intent(getApplicationContext(), SanPhamActivity.class);
//                        dienthoai.putExtra("loai", mangloaisp.get(position).getId());
                        freeze.putExtra("loai", position);
                        freeze.putExtra("title", "Freeze");
                        startActivity(freeze);
                        break;
                    case 5:
                        Intent donhang = new Intent(getApplicationContext(), XemDonActivity.class);
                        startActivity(donhang);
                        break;
                    case 6:
                        //xoa key user
                        Paper.book().delete("user");
                        Intent dangnhap = new Intent(getApplicationContext(), DangNhapActivity.class);
                        startActivity(dangnhap);
                        break;
                }
            }
        });
    }

    private void getSpMoi() {
        compositeDisposable.add(apiBanHang.getSpMoi()
        .subscribeOn(Schedulers.io())
        .observeOn(AndroidSchedulers.mainThread())
        .subscribe(
                sanPhamMoiModel ->{
                    if (sanPhamMoiModel.isSuccess()){
                        mangSpMoi = sanPhamMoiModel.getResult();
                        spAdapter = new SanPhamMoiAdapter(getApplicationContext(), mangSpMoi);
                        recyclerViewManHinhChinh.setAdapter(spAdapter);
                    }
                },throwable -> {
                    Toast.makeText(getApplicationContext(),"Không kết nối được Server" +throwable.getMessage(), Toast.LENGTH_LONG).show();
                }
        ));

    }

    private void getLoaiSanPham() {
        compositeDisposable.add(apiBanHang.getLoaiSp()
        .subscribeOn(Schedulers.io())
        .observeOn(AndroidSchedulers.mainThread())
        .subscribe(
                loaiSpModel -> {
                    if (loaiSpModel.isSuccess()){
                        Toast.makeText(getApplicationContext(), loaiSpModel.getResult().get(0).getTensanpham(), Toast.LENGTH_LONG).show();
                        mangloaisp = loaiSpModel.getResult();
                        // khoi tao adapter
                        mangloaisp.add(new LoaiSp("Đăng xuất","data:image/png;base64,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"));
                        loaiSpAdapter = new LoaiSpAdapter(getApplicationContext(), mangloaisp);
                        listViewManHinhChinh.setAdapter(loaiSpAdapter);
                    }
                }
        ));
    }

    private void ActionViewFlipper() {
        List<String> mangquangcao = new ArrayList<>();
        mangquangcao.add("https://png.pngtree.com/thumb_back/fw800/back_our/20190621/ourmid/pngtree-delicious-coffee-shop-hand-drawn-brown-background-image_187138.jpg");
        mangquangcao.add("https://img.freepik.com/free-photo/coffee-cup-red-with-morning-sunshine-mountain-view_33807-520.jpg?size=626&ext=jpg");
        mangquangcao.add("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSPIDd8NOpxNZRsYt4DmeWoC_0Y_XBbvzOu7Q&usqp=CAU");
        for (int i = 0; i < mangquangcao.size(); i++){
            ImageView imageView = new ImageView(getApplicationContext());
            Glide.with(getApplicationContext()).load(mangquangcao.get(i)).into(imageView);
            imageView.setScaleType(ImageView.ScaleType.FIT_XY);
            viewFlipper.addView(imageView);
        }
        viewFlipper.setFlipInterval(3000);
        viewFlipper.setAutoStart(true);
        Animation slide_in = AnimationUtils.loadAnimation(getApplicationContext(), R.anim.slide_in_right);
        Animation slide_out = AnimationUtils.loadAnimation(getApplicationContext(), R.anim.slide_out_right);
        viewFlipper.setInAnimation(slide_in);
        viewFlipper.setOutAnimation(slide_out);
    }

    private void ActionBar() {
        setSupportActionBar(toolbar);
        getSupportActionBar().setDisplayHomeAsUpEnabled(true);
        toolbar.setNavigationIcon(android.R.drawable.ic_menu_sort_by_size);
        toolbar.setNavigationOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                drawerLayout.openDrawer(GravityCompat.START);
            }
        });
    }

    private void AnhXa() {
        apiBanHang = RetrofitClient.getInstance(Utils.BASE_URL).create(ApiBanHang.class);
        toolbar = findViewById(R.id.toolbarmanhinhchinh);
        viewFlipper = findViewById(R.id.viewflipper);
        recyclerViewManHinhChinh = findViewById(R.id.recyclerview);
        RecyclerView.LayoutManager layoutManager = new GridLayoutManager(this,2);
        recyclerViewManHinhChinh.setLayoutManager(layoutManager);
        recyclerViewManHinhChinh.setHasFixedSize(true);
        listViewManHinhChinh = findViewById(R.id.listviewmanhinhchinh);
        navigationView = findViewById(R.id.navigationview);
        drawerLayout = findViewById(R.id.drawerlayout);
        badge = findViewById(R.id.menu_sl);
        frameLayout = findViewById(R.id.framegiohang);
        imgsearch = findViewById(R.id.imgsearch);


        tennguoidung= findViewById(R.id.tenND);
        gmailnguoidung = findViewById(R.id.gmailND);

        String ten = Utils.user_current.getUsername();
        String gmail = Utils.user_current.getEmail();

        tennguoidung.setText(ten);
        gmailnguoidung.setText(gmail);

        //khoi tao List
        mangloaisp = new ArrayList<>();
        mangSpMoi = new ArrayList<>();
        //mang gio hang
        if (Utils.manggiohang == null){
            Utils.manggiohang = new ArrayList<>();
        }else{
            int totalItem = 0;
            for(int i = 0; i < Utils.manggiohang.size(); i++){
                totalItem = totalItem + Utils.manggiohang.get(i).getSoluong();
            }
            badge.setText(String.valueOf(totalItem));
        }
        frameLayout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent giohang = new Intent(getApplicationContext(), GioHangActivity.class);
                startActivity(giohang);
            }
        });

        imgsearch.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent= new Intent(getApplicationContext(), SearchActivity.class);
                startActivity(intent);
            }
        });
    }

    @Override
    protected void onResume() {
        super.onResume();
        int totalItem = 0;
        for(int i = 0; i < Utils.manggiohang.size(); i++){
            totalItem = totalItem + Utils.manggiohang.get(i).getSoluong();
        }
        badge.setText(String.valueOf(totalItem));
    }

    private boolean isConnected(Context context){
        ConnectivityManager connectivityManager = (ConnectivityManager) context.getSystemService(Context.CONNECTIVITY_SERVICE);
        NetworkInfo wifi = connectivityManager.getNetworkInfo(ConnectivityManager.TYPE_WIFI); //nho them quyen vao khong bi loi
        NetworkInfo mobile = connectivityManager.getNetworkInfo(ConnectivityManager.TYPE_MOBILE);
        if((wifi != null && wifi.isConnected()) || (mobile != null && mobile.isConnected())){
            return true;
        }else {
            return false;
        }
    }

    @Override
    protected void onDestroy() {
        compositeDisposable.clear();
        super.onDestroy();
    }
}