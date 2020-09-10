import scipy.misc
import SimpleITK as sitk
img = sitk.ReadImage(myimage)
a=sitk.GetArrayFromImage(img)
im=a[:,:,length(a(1,1,:))/2]
scipy.misc.imsave(img+'_new.jpg',im)
