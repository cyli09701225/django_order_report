"""kgi URL Configuration

The `urlpatterns` list routes URLs to views. For more information please see:
    https://docs.djangoproject.com/en/2.0/topics/http/urls/
Examples:
Function views
    1. Add an import:  from my_app import views
    2. Add a URL to urlpatterns:  path('', views.home, name='home')
Class-based views
    1. Add an import:  from other_app.views import Home
    2. Add a URL to urlpatterns:  path('', Home.as_view(), name='home')
Including another URLconf
    1. Import the include() function: from django.urls import include, path
    2. Add a URL to urlpatterns:  path('blog/', include('blog.urls'))
"""
from django.contrib import admin
from django.urls import path
from order_report import views as front
from back_end import views as back

urlpatterns = [
    path('admin/', admin.site.urls),
    path('index.html', front.index_html),
    path('order_detail.html', front.order_detail_html),
       
    path('py/get_report/',  back.get_report),
    path('py/login/',  back.login),
    path('py/logout/',  back.logout),
]
