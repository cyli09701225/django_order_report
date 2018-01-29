from django.shortcuts import render, redirect
from django.contrib import auth
from django.contrib.auth import authenticate
from django.http import HttpResponse

def get_report(request):
    name = request.GET['name']
    return HttpResponse("你好棒 " + name)

def login(request):
    if request.method == 'POST':
        name = request.POST['mendername']
        password = request.POST['password']
        user = auth.authenticate(username=name, password=password)
        if user is not None:
            if user.is_active:
                auth.login(request, user)
                return redirect('/order_detail.html')
                message = '登入成功！'
            else:
                message = '帳號尚未啟用！'
        else:
            message = '登入失敗！'
    return redirect('/index.html')

def logout(request):
    auth.logout(request)
    return redirect('/index.html')