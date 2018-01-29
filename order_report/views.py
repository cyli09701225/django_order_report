from django.shortcuts import render, redirect  
#from django.contrib.auth.models import User

def index_html(request):
    if request.user.is_authenticated:
        return redirect('/order_detail.html')
    else:
        return render(request, "index.html")
    
def order_detail_html(request):
    if request.user.is_authenticated:
        return render(request, "order_detail.html")
    else:
        return redirect('/index.html')
    