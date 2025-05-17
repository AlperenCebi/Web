// Klasik JavaScript ile kontrol
function kontrolEt() {
  const ad = document.getElementById("adsoyad").value;
  const email = document.getElementById("email").value;
  const telefon = document.getElementById("telefon").value;
  const cinsiyet = document.querySelector('input[name="cinsiyet"]:checked');
  const dogumTarihi = document.getElementById("dogumTarihi").value;
  const sehir = document.getElementById("sehir").value;
  const mesaj = document.getElementById("mesaj").value;
  const abone = document.getElementById("abone").checked;

  if (!ad || !email || !telefon || !cinsiyet || !dogumTarihi || !sehir || !mesaj) {
    alert("Lütfen tüm alanları doldurunuz.");
  } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
    alert("Geçerli bir e-posta adresi giriniz.");
  } else if (!/^\d+$/.test(telefon)) {
    alert("Telefon numarası sadece rakamlardan oluşmalıdır.");
  } else {
    alert("JavaScript ile form başarıyla gönderildi.");
  }
}

// Vue ile form kontrolü ve yönlendirme
const app = Vue.createApp({
  data() {
    return {
      ad: '',
      email: '',
      telefon: '',
      cinsiyet: '',
      dogumTarihi: '',
      sehir: '',
      mesaj: '',
      abone: false
    };
  },
  methods: {
    vueIleKontrolEt() {
      let eksikler = [];

      if (!this.ad) eksikler.push("Ad Soyad");
      if (!this.email) eksikler.push("E-posta");
      if (!this.telefon) eksikler.push("Telefon");
      if (!this.cinsiyet) eksikler.push("Cinsiyet");
      if (!this.dogumTarihi) eksikler.push("Doğum Tarihi");
      if (!this.sehir) eksikler.push("Şehir");
      if (!this.mesaj) eksikler.push("Mesaj");

      const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (this.email && !emailPattern.test(this.email)) {
        eksikler.push("E-posta formatı geçersiz");
      }

      if (this.telefon && !/^\d+$/.test(this.telefon)) {
        eksikler.push("Telefon sadece rakam olmalı");
      }

      if (eksikler.length > 0) {
        alert("Lütfen düzeltin:\n- " + eksikler.join("\n- "));
      } else {
        // Bilgileri URL parametreleriyle gönder
        const query = new URLSearchParams({
          ad: this.ad,
          email: this.email,
          telefon: this.telefon,
          cinsiyet: this.cinsiyet,
          dogumTarihi: this.dogumTarihi,
          sehir: this.sehir,
          mesaj: this.mesaj,
          abone: this.abone ? "Evet" : "Hayır"
        }).toString();

        window.location.href = `form-sonuc.html?${query}`;
      }
    }
  }
});

// Vue uygulamasını form üzerine bağla
app.mount('#iletisimForm');
